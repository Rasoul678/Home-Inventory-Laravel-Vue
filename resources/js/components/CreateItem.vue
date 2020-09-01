<script>
import swal from "sweetalert";

export default {
    props: ['companies'],

    data(){
        return {
            classes: `border-2 p-2 rounded ${this.companies.length ? 'border-black ' : 'border-red-500'} w-full`,
            itemName: '',
            itemCompany: '',
            itemLength: '',
            itemWidth: '',
            itemHeight: '',
            itemVolume: '',
            itemShape: '',
            itemType: '',
            itemDescription: '',
        }
    },

    methods: {
        clear(){
            this.itemName= '';
            this.itemCompany= '';
            this.itemLength= '';
            this.itemWidth= '';
            this.itemHeight= '';
            this.itemVolume= '';
            this.itemShape= '';
            this.itemType= '';
            this.itemDescription= '';
        },

        createItem(){
            const size = {
                shape_id: this.itemShape,
                name: `${this.itemName}_${this.itemCompany}`,
                length: this.itemLength,
                width: this.itemWidth,
                height: this.itemHeight,
                volume: this.itemVolume,
            };
            axios({
                method: 'POST',
                url: '/api/items/size',
                data: size
            })
                .then((response) => {
                    const item = {
                        size_id: response.data.id,
                        company_id: this.itemCompany,
                        item_type_id: this.itemType,
                        name: this.itemName,
                        description: this.itemDescription,
                    };

                    axios({
                        method: 'POST',
                        url: '/api/items',
                        data: item
                    })
                        .then((response) => {
                            if(response.data.message){
                                swal({
                                    title: response.data.message,
                                    text: 'Select another name, Please.',
                                    icon: "warning",
                                    buttons: false,
                                    timer: 3000,
                                });
                            }else{
                                swal({
                                    title: "Good job!",
                                    text: "Item has been added!",
                                    icon: "success",
                                    button: "OK",
                                });
                                this.clear();
                            }
                        })
                        .catch(error => console.log(error));
                })
                .catch((error) => console.log(error));
        }
    },

    mounted() {
        if(this.companies.length === 0){
            swal({
                title: "No Companies!",
                text: "Add Company First.",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
                .then((willAdd) => {
                    if (willAdd) {
                        window.location.href = '/companies/create';
                    } else {
                        swal("You can do it later. enjoy!", {
                            icon: 'success'
                        });
                    }
                });
        }
    }
}
</script>
