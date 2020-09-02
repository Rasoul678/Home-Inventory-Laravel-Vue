<script>
export default {
    props: ['item'],

    data(){
        return {
            images: [],
        }
    },

    methods: {
        uploadImage(e){
            const input = e.target.elements[0];

            if(! input.files.length) return;

            let file = input.files[0];

            let reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = (e) => {
                let image = {
                    id: -1,
                    image_url: e.target.result
                };
                this.images = [...this.images, image]
            };

            e.target.reset();

            this.persist(file);
        },

        persist(file){
            let data = new FormData();

            data.append('item-image', file);

            axios({
                method: 'POST',
                url: `/api/items/${this.item.id}/images`,
                data
            })
                .then(response => {
                    swal({
                        title: "Good job!",
                        text: "Image has been added!",
                        icon: "success",
                        button: "OK",
                    });
                    let image = this.images.find(img => img.id === -1);
                    image.id = response.data.id;
                    console.log(response.data);
                })
                .catch(error => console.log(error));
        },

        deleteImage(id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you won't be able to recover it.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let index = this.images.findIndex(img => img.id === id);
                        this.images.splice(index, 1);
                        this.remove(id);
                    } else {
                        swal("Your image is safe!");
                    }
                });
        },

        remove(id){
            axios({
                method: 'DELETE',
                url: `/api/items/${this.item.id}/images/${id}`,
            })
                .then(response => {
                    swal("Poof! Your image has been deleted!", {
                        icon: "success",
                    });
                    console.log(response.data);
                })
                .catch(error => console.log(error));
        }

    },

    mounted() {
        this.item.images.forEach((image) => {
            this.images.push({
                id: image.id,
                image_url: image.image_url,
            });
        });
    }
}
</script>
