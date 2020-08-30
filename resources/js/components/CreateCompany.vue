<script>
export default {
    props: [],

    data(){
        return {
            addressId: null,
            companyName: '',
            companyEmail: '',
            companyType: '',
            companyLogo: '',
            companyWebsite: '',
            companyDescription: ''
        }
    },

    methods: {
        setAddress(id){
            this.addressId = id;
        },

        clear(){
            this.addressId = null;
            this.companyName = '';
            this.companyEmail = '';
            this.companyType = '';
            this.companyLogo = '';
            this.companyWebsite = '';
            this.companyDescription = '';
        },

        createCompany(){
            const company = {
                address_id: this.addressId,
                name: this.companyName,
                email: this.companyEmail,
                type: this.companyType,
                description: this.companyDescription,
                logo_url: this.companyLogo,
                website_url: this.companyWebsite,
            };

            axios({
                method: 'POST',
                url: '/api/companies',
                data: company
            })
                .then(response => {
                    this.clear();
                    console.log(response.data);
                })
                .catch(error => console.log(error));
        }
    }
}
</script>
