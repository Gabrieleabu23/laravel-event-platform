<script>
import { store } from "../store";
import axios from "axios";
export default {
    name: "login",
    data() {
        return {
            store,
            credenziali: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        home() {
            store.view = 0;
        },
        ProvaLogin() {
            axios.post("http://localhost:8000/api/v1/login", this.credenziali)
                .then(response => {
                    console.log(response.data);
                    if (response.data.status === 'success') {
                        window.location.href = 'http://localhost:8000/dashboard';
                        }
                    
                })
                .catch(error => {
                   
                    console.error("Errore nella richiesta di login:", error);
                });
        },
        
    },
};
</script>

<template>
    <router-link to="/" @click="home()">Home</router-link>

    <form @submit.prevent="ProvaLogin()" method="post" >
        
    <label>Email:</label>
    <input v-model="credenziali.email" required />

    <label>Password:</label>
    <input v-model="credenziali.password" type="password" required />

    <button type="submit">Login</button>
</form>

</template>

<style lang="scss" scoped>
@use "../styles/general.scss" as *;
</style>
