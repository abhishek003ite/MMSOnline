<template>
    <router-view></router-view>
</template>

<script>
export default {
    created(){
        EventBus.$on('logout', () => {
            User.logout()
        })
    }
}
</script>

<style>

</style>
