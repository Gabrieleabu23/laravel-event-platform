<template>
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

<script>
import axios from "axios";

export default {
    name: "ApiContent",
    data() {
        return {
            events: [],

            users: [],
        };
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
                console.err(err);
            });
    },
};
</script>
