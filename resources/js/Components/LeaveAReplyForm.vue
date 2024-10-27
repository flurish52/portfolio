<template>
    <div class="bg-white w-full md:w-full md:mx-5">
        <div class="p-">
            <!-- Header -->
            <h2 class="text-lg font-semibold mb-2">Leave a Reply</h2>
            <p class="text-gray-600 mb-6">
                We would love to hear from you
            </p>

            <!-- Form -->
            <form @submit.prevent="submitQuote" class="w-full p-6 flex flex-col justify-center items-center">
                <!-- Name -->
                <div class="w-full flex-col">
                    <div class="w-full m-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="name">Name *</label>
                        <input
                            v-model="form.fullname"
                            type="text"
                            id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring"
                            required
                        />
                    </div>

                    <!-- Email -->
                    <div class="w-full m-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="email">Email Address *</label>
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring"
                            required
                        />
                    </div>
                    <div class="w-full m-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="telephone">Telephone </label>
                        <input
                            v-model="form.telephone"
                            type="text"
                            id="telephone"
                            placeholder="Optional"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring"
                        />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2" for="message">Message *</label>
                        <textarea
                            v-model="form.message"
                            id="message"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring"
                            rows="4"
                            required
                        ></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    :disabled="loading"
                    :class="loading ? 'bg-gray-500 cursor-not-allowed' : 'bg-yellow-500 hover:bg-green-600'"
                    style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);"
                    class="w-full text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring"
                >
                    <span v-if="loading">Processing...</span>
                    <span v-else>Hire Me</span>
                    <svg v-if="!loading" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// Form object to bind data
let form = useForm({
    fullname: '',
    email: '',
    telephone: '',
    message: '',
    read_status: ''
});

// Loading state for the button
const loading = ref(false);

// Submit form data to backend
const submitQuote = async () => {
    try {
        loading.value = true; // Start loading
        await axios.post('/hire-me', form);
        form.reset();
        window.location.href = '/alert'
    } catch (error) {
        console.error('Error submitting quote:', error);
    } finally {
        loading.value = false; // End loading
    }
};
</script>
