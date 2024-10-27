<template>
    <MiniLanding
        :pageName = "pageName"
    />



    <div class="overflow-x-auto">
        <table class="min-w-full bg-teal-100 text-left">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">Full Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Date subscribed</th>
                <th class="py-2 px-4">Action</th>
                <th class="py-2 px-4">Activities</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(subscriber, index) in subscribersProp" :key="subscriber.id" class=" text-gray-800 border-b rounded-md">

                <td class="py-2 px-4">{{ subscriber.name }}</td>
                <td class="py-2 px-4">{{ subscriber.email }}</td>
                <td class="py-2 px-4">{{ new Date(subscriber.created_at).toLocaleString() }}</td>
                <td class="py-2 px-4">
                    <button
                        class="bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 focus:outline-none"
                    >
                        View activities
                    </button>
                </td>      <td class="py-2 px-4">
                    <button
                        @click="deleteUser(subscriber, index)"
                        class="bg-red-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none"
                    >
                        Delete User
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    name: "Subscribers",
    layout: AuthenticatedLayout,
}
</script>

<script setup>
import MiniLanding from "@/Components/MiniLanding.vue";
import { getCurrentInstance } from "vue";
import { defineProps, ref } from 'vue';
import subscribers from "@/Pages/Auth/Subscribers.vue";

// Receive props from backend
let props = defineProps({
    usersList: Object,
})

let subscribersProp = ref(props.usersList)

let instance = getCurrentInstance()
let pageName =  instance.type.name

let deleteUser = (user, index)=>{
    if (axios.delete('/delete-subscriber/'+ user.id)){
        subscribersProp.value.splice(index, 1)
    }

}
</script>
