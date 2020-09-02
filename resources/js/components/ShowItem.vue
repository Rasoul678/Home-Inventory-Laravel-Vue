<script>
export default {
    props: ['item'],

    data(){
        return {
            avatars: [],
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
                let avatar = {
                    id: -1,
                    image_url: e.target.result
                };
                this.avatars = [...this.avatars, avatar]
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
                    let avatar = this.avatars.find(avatar => avatar.id === -1);
                    avatar.id = response.data.id;
                    console.log(response.data);
                })
                .catch(error => console.log(error));
        },

        deleteImage(id){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will be able to recover this image, Soon!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let index = this.avatars.findIndex(avatar => avatar.id === id);
                        this.avatars.splice(index, 1);
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
            this.avatars.push({
                id: image.id,
                image_url: image.image_url,
            });
        });
    }
}
</script>
