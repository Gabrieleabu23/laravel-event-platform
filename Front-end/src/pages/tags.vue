<script>
import axios from "axios";
import { store } from "../store";
export default {
    name: "show",
    data() {
        return {
            tags:[]
        };
    },
    methods:{
        riempiVet(id){
            this.tags.forEach(element => {
                if(element.id == id){
                    store.vettore=element;
                    console.log(element);
                }
            });
        }
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8000/api/v1/tags")
            .then((res) => {
                const data = res.data;

                if (data.status == "success") {
                    this.tags = data.tags;
                    
                    // console.log("eventi: ", this.events);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>

<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/tags">Tags</router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse "
                id="navbarNavDropdown"
            >
                
            </div>
        </div>
    </nav>
    <li  v-for="tag in tags" :key="tag.id">
            <div class="d-flex align-items-center gap-3">
                <span>{{tag.id}}</span>
                <router-link  to="/show" @click="riempiVet(tag.id)"><h4 class="mb-2">{{ tag.name }}</h4></router-link>
                
            </div>

        </li>
</template>

<style lang="scss" scoped>
@use "../styles/general.scss" as *;
</style>
