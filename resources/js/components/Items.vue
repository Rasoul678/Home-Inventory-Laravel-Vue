<script>
import swal from 'sweetalert';

export default {
    props: ['items', 'user'],

    data(){
        return {

        }
    },

    methods: {

    },

    mounted() {
        if(this.items.length === 0 && this.user.role !== 'user'){
            swal({
                title: "Empty Inventory!",
                text: "Build your inventory by adding some items.",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
                .then((willAdd) => {
                    if (willAdd) {
                        swal("Ok! Build Your Inventory.", {
                            icon: "success",
                        });
                        window.setTimeout(() => {
                            window.location.href = '/items/create';
                        }, 1500)
                    } else {
                        swal("You can do it later. enjoy!");
                    }
                });
        }
    }
}
</script>
