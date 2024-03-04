<script>
import ApiContent from "./components/ApiContent.vue";
import { store } from './store'
export default {
    components: {
        ApiContent,
    
    },
    data() {
        return {
            store
        };
    }

};
</script>

<template>
    
    <div class="container w-75">
        <div class="d-flex justify-content-between">
            <router-link  to="/">Home</router-link>
            <router-link  to="/tags">Tags</router-link>
            <router-link  to="/about">About</router-link>
        </div>
    </div>
    
    <router-view></router-view>
    
</template>

<style scoped>
.logo {
    height: 6em;
    padding: 1.5em;
    will-change: filter;
    transition: filter 300ms;
}
.logo:hover {
    filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
    filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
