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
                class="collapse navbar-collapse flex-grow-0"
                id="navbarNavDropdown"
            >
                <ul class="navbar-nav w-100 justify-content-between">
                    <li class="nav-item">
                        <router-link @click="Visualizza()" to="/login"
                            >Login</router-link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>I NOSTRI USERS:</h1>
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
        <li v-for="user in users" :key="user.id">
            <h4>{{ user.name }}</h4>
            <strong>Gli eventi:</strong>
            <div v-for="event in events" :key="event.id">
                <p v-if="event.user_id == user.id">
                    {{ event.name }}
                </p>
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
    methods: {
        Visualizza() {
            store.view = 1;
        },
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
