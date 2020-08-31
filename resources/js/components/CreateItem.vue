<script>
export default {
    props: [],

    data(){
        return {
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
}
</script>
