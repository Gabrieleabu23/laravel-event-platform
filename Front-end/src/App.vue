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
    
        <ApiContent v-if="store.view ===0"/>
        
    
    <router-view v-else></router-view>
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
