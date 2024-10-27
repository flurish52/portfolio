<template>
    <!-- Form Section -->
    <form
        @submit.prevent="submit"

        class="mt-8 sm:flex w-1/2 mx-auto">
        <!-- First Name Input -->
        <input
            v-model="form.name"
            aria-label="First Name"
            type="text"
            required
            placeholder="First Name"
            class="appearance-none w-full px-4 py-3 border border-gray-300 text-black rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:flex-1"
        />

        <!-- Email Address Input -->
        <input
            v-model="form.email"
            aria-label="Email Address"
            type="email"
            required
            placeholder="Email Address"
            class="appearance-none w-full mt-3 px-4 py-3 border border-gray-300 text-black rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:ml-3 sm:mt-0 sm:flex-1"
        />

        <!-- Subscribe Button -->
        <button
            type="submit"
            class="mt-3 w-full px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:mt-0 sm:w-auto sm:flex-shrink-0"
        >
            Subscribe
        </button>
    </form>
</template>
<script setup>
import {useForm} from "@inertiajs/vue3";

let form = useForm({
    name: '',
    email: '',
})

const submit = () => {
    form.post('/addsubscriber')
    console.log('form sent')
};




</script>
