<template>
    <button
        @click="deleteItem"
        class="bg-red-500 px-3 py-1 mr-2 rounded"
    >
        Delete
    </button>
</template>

<script>
export default {
    props: ['item'],

    data(){
        return{

        }
    },

    methods: {
        deleteItem(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you won't be able to recover it.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        axios({
                            method: 'DELETE',
                            url: `/api/items/${this.item.id}`
                        })
                        .then(() => {
                            window.location.href = '/items';
                        })
                        .catch(error => console.log(error))
                    } else {
                        swal("Your item is safe!");
                    }
                });
        }
    }
}
</script>
