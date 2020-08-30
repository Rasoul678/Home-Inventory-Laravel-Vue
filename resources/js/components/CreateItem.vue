<script>
export default {
    props: ['user'],

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
                        user_id: this.user.id,
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
                            swal("Item has been added!", {
                                buttons: false,
                                timer: 3000,
                            });
                            this.clear();
                        })
                        .catch(error => console.log(error));
                })
                .catch((error) => console.log(error));
        }
    },
}
</script>
