<template>
    <div v-if="isOpen" class="fixed inset-0 flex items-center w-full justify-center z-50">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="relative bg-white rounded-lg shadow-lg p-6 z-50 max-w-md w-full">
            <h3 class="text-lg font-semibold mb-4">Details</h3>

            <!-- Information Display -->
            <div class="mb-4">
                <label class="font-bold">Full Name:</label>
                <p>{{ hireMeRequest.fullname }}</p>
            </div>

            <div class="mb-4">
                <label class="font-bold">Email:</label>
                <p>{{ hireMeRequest.email }}</p>
            </div>

            <div class="mb-4">
                <label class="font-bold">Telephone:</label>
                <p>{{ hireMeRequest.telephone || 'Not Provided' }}</p>
            </div>

            <div class="mb-4">
                <label class="font-bold">Message:</label>
                <p>{{ hireMeRequest.message }}</p>
            </div>

            <div class="mb-4">
                <label class="font-bold">Date & Time Sent:</label>
                <p>{{ new Date(hireMeRequest.created_at).toLocaleString() }}</p>
            </div>

            <!-- Close Button -->
            <button
                @click="closeModal"
                class="absolute top-2 right-2 bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none"
            >
                Close
            </button>
            <Link :href="`/hire-me/reply/${hireMeRequest.id}`">
                <button
                    class="bg-yellow-500 w-full text-white font-bold py-2 px-4 rounded-lg mt-4 hover:bg-yellow-700"
                >
                    Reply
                </button>
            </Link>
        </div>


    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    isOpen: Boolean,
    hireMeRequest: Object, // Object containing fullname, email, telephone, message, created_at
});

const emit = defineEmits(['close']);

// Close modal function
const closeModal = () => {
    emit('close');
};
</script>

