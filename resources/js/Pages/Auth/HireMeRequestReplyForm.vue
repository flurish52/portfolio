<template>
    <div class="container mx-auto p-6">
        <!-- HireMeRequest Details -->
        <div class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-lg font-bold mb-4">Request Details</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-bold">Full Name:</label>
                    <p>{{ hireMeRequest.fullname }}</p>
                </div>
                <div>
                    <label class="font-bold">Email:</label>
                    <p>{{ hireMeRequest.email }}</p>
                </div>
                <div>
                    <label class="font-bold">Telephone:</label>
                    <p>{{ hireMeRequest.telephone || 'Not Provided' }}</p>
                </div>
                <div>
                    <label class="font-bold">Date & Time Sent:</label>
                    <p>{{ new Date(hireMeRequest.created_at).toLocaleString() }}</p>
                </div>
            </div>
            <div class="mt-4">
                <label class="font-bold">Message:</label>
                <p>{{ hireMeRequest.message }}</p>
            </div>
        </div>

        <!-- Admin Reply Form -->
        <div class="bg-white shadow-md rounded p-6">
            <h2 class="text-lg font-bold mb-4">Reply to {{ hireMeRequest.fullname }}</h2>
            <form @submit.prevent="submitReply">
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2" for="replyMessage">Your Reply *</label>
                    <textarea
                        v-model="replyMessage"
                        id="replyMessage"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring"
                        rows="6"
                        required
                    ></textarea>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring"
                        :disabled="isSubmitting"
                    >
                        <span v-if="!isSubmitting">Send Reply</span>
                        <span v-else>Sending...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    layout: AuthenticatedLayout,
}
</script>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

let props = defineProps({
    hireMeRequest: Object, // Object containing fullname, email, telephone, message, created_at
});

const replyMessage = ref('');
const isSubmitting = ref(false);

// Submit reply function
const submitReply = async () => {
    isSubmitting.value = true;

    try {
        // Make API request to send reply
        await axios.post(`/hire-me-reply/${hireMeRequest.id}`, {
            replyMessage: replyMessage.value,
        });

        // Reset the form after successful submission
        replyMessage.value = '';
        alert('Reply sent successfully');
    } catch (error) {
        console.error('Error sending reply:', error);
        alert('Failed to send reply. Please try again.');
    } finally {
        isSubmitting.value = false;
    }
};
</script>

<style scoped>
.container {
    max-width: 800px;
}
</style>
