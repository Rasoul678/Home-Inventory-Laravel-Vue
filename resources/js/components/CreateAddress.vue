<script>
export default {
    props: [],

    data(){
        return {
            address_1: '',
            address_2: '',
            selectedCountry: '',
            selectedState: '',
            states: [],
            city: '',
            zipcode: '',
            latitude: '',
            longitude: ''
        }
    },

    methods: {
        setStates(){
            if(!this.selectedCountry) return this.states = [];
            this.states = JSON.parse(this.selectedCountry).states;
        },

        setLatLng({lat, lng}){
            this.latitude = lat;
            this.longitude = lng;
        },

        clear(){
            this.address_1 = '';
            this.address_2 = '';
            this.selectedCountry = '';
            this.selectedState = '';
            this.city = '';
            this.states = [];
            this.zipcode = '';
            this.latitude = '';
            this.longitude = '';
        },

        createAddress(){
            const address = {
                street_address_1: this.address_1,
                street_address_2: this.address_2,
                state_id: this.selectedState,
                city: this.city,
                zipcode: this.zipcode,
                latitude: this.latitude,
                longitude: this.longitude
            };

            axios({
                method: 'POST',
                url: '/api/addresses',
                data: address
            })
                .then((response) => {
                    this.clear()
                })
                .catch((error) => console.log(error))
        }
    },

}
</script>
