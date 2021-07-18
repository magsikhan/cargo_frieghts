<template>
    <div>
            <top-header></top-header>
            <sidebar></sidebar>
            <slot></slot>
    </div>
</template>

<script>
import TopHeader from '../components/Header.vue';
import Sidebar from '../components/Sidebar.vue';
export default {
    name:'Layout',
    components:{
        TopHeader,
        Sidebar
        }
}
</script>