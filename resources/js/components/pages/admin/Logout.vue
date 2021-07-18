<template>
    <div>

    </div>
</template>

<script>
export default {
    name:'Logout',
    created(){
    localStorage.removeItem('token')
    localStorage.removeItem('user');
    this.$router.push('/login/admin');
    this.$tosted.success('You are Logout!')    
    }
}
</script>
<style scoped>
.content-body {
    margin-top: 4%;
}
</style>

