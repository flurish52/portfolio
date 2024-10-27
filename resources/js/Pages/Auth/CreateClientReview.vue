<template>
    <MiniLanding
        :pageName="pageName"
        />

    <form @submit.prevent="submitForm" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
        <!-- Client Name -->
        <div class="mb-4">
            <label for="client_name" class="block text-sm font-medium text-gray-700">Client Name</label>
            <input v-model="form.client_name" id="client_name" type="text" placeholder="Client Name"
                   class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
        </div>

        <!-- Company/Role -->
        <div class="mb-4">
            <label for="company_role" class="block text-sm font-medium text-gray-700">Company/Role</label>
            <input v-model="form.company_role" id="company_role" type="text" placeholder="Company/Role"
                   class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
        </div>

        <!-- Message -->
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea v-model="form.message" id="message" placeholder="Your Message"
                      class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"></textarea>
        </div>

        <!-- Avatar -->
        <div class="mb-4">
            <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
            <input @change="handleFileUpload" id="avatar" type="file" accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-yellow-700 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-300">
                Submit
            </button>
        </div>
    </form>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    layout: AuthenticatedLayout,
    name: "Create a review"
};
</script>

<script setup>

import {useForm} from "@inertiajs/vue3";
import {getCurrentInstance} from "vue";
import MiniLanding from "@/Components/MiniLanding.vue";

let instance = getCurrentInstance()
let pageName = instance.type.name

let form = useForm({
    client_name: '',
        company_role: '',
        message: '',
        avatar: ''
})


let handleFileUpload = (event) =>{
   form.avatar = event.target.files[0];
}
let submitForm =  () =>{
    axios.post('/review/create', {form})
}
</script>
