<template>
    <h2>this is login</h2>
    <form @submit.prevent="login">
        <input type="email" placeholder="email" v-model="form.email">
        <input type="password" placeholder="password" v-model="form.password">
        <button type="submit">Log In</button>
    </form>
    <!-- Display tasks if available -->
    <div v-if="tasks.length">
        <h3>Tasks:</h3>
        <ul>
            <li v-for="task in tasks" :key="task.id">
                Name : {{ task.name }} - ID: {{ task.id }}, Achieved: {{ task.achieved ? 'Yes' : 'No' }}
            </li>
        </ul>
    </div>
</template>
<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { reactive } from 'vue';

const form = reactive({
    email: '',
    password: ''
});
const tasks = reactive([]);
function login() {
    console.log(form.email)
    console.log(form.password)
}
axios.get("http://localhost/task-management/api/data.php") // Update the URL based on your project structure
    .then((response) => {
        tasks.splice(0, tasks.length, ...response.data); // Replace contents of 'tasks' with the received data
    })
    .catch((error) => {
        console.log(error);
    });
console.log(("tasks", tasks))

</script>
<style></style>