<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">Events</router-link>
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

    <h1>I NOSTRI EVENTI:</h1>
    <!-- <form v-if="createFormActive" @submit.prevent="submitNewTechnology">
        <label for="name">Technology name: </label>
        <input
            type="text"
            name="name"
            id="name"
            v-model="newTechnology.technology_name"
        />
        <input type="submit" value="CREA" />
        <br />
    </form> -->
    <ul>
        <li  v-for="event in events" :key="event.id">
            <div class="d-flex align-items-center gap-3">
                <span>{{event.id}}</span>
                <router-link  to="/show" @click="riempiVet(event.id)"><h4 class="mb-2">{{ event.name }}</h4></router-link>
                
            </div>

        </li>
    </ul>
</template>

<style scoped lang="scss">
@import "../styles/general.scss";
ul {
    list-style-type: none;
}
.dropdown-menu.show {
    left: -20%;
}
</style>

<script>
import { store } from "../store";
import axios from "axios";

export default {
    name: "ApiContent",
    data() {
        return {
            events: [],
            store,
            users: [],
        };
    },
    methods:{
        riempiVet(id){
            this.events.forEach(element => {
                if(element.id == id){
                    store.vettore=element;
                    store.view=1;
                }
            });
        }
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8000/api/v1/event")
            .then((res) => {
                const data = res.data;

                if (data.status == "success") {
                    this.events = data.events;
                    this.users = data.users;
                    // console.log("eventi: ", this.events);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>
