<template>
    <div class="text-center text-6xl">
        Welcome!
    </div>
</template>

<script>
export default {
    props: ['user'],

    data(){
        return {
            authUser: this.user
        }
    },

    mounted() {
        console.log(this.user);
    }

}
</script>
