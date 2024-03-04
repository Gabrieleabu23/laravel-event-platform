<script>
import { store } from "../store";
export default {
    name: "show",
    data() {
        return {
            store,
        };
    },
};
</script>

<template>
    <div v-if="store.view">
        <h4>{{ store.vettore.name }}</h4>
        <h4>{{ store.vettore.description }}</h4>
        <h4>{{ store.vettore.event_date }}</h4>
    </div>
    <div v-else>
        <div class="d-flex align-items-center gap-4">
            <h4>{{ store.vettore.id }}</h4>
            <h4 >{{ store.vettore.name }}</h4>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../styles/general.scss" as *;
</style>
