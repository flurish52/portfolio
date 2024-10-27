<template>
    <MiniLanding
        :pageName = "pageName"
    />
    <div class="overflow-x-auto">
        <table class="min-w-full bg-teal-100 text-center">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">Full Name</th>
                <th class="py-2 px-4">Company/Role</th>
                <th class="py-2 px-4">Message</th>
                <th class="py-2 px-4">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="review in adminReviews" :key="review.id" class=" text-gray-800 border-b rounded-md"
            >
                <td class="py-2 px-4">{{ review.client_name }}</td>
                <td class="py-2 px-4">{{ review.company_role }}</td>
                <td class="py-2 px-4">{{ truncateMessage(review.message) }}</td>

                <td class="py-2 px-4">
                    <button
                        @click="openModal(review)"
                        class="bg-slate-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-teal-700 focus:outline-none"
                    >
                        View details
                    </button>
                </td>
                <DisplayReview
                    :isOpen="isModalOpen"
                    :review="review"
                    @close="isModalOpen = false"
                />
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    name: "Clients Review",
    layout: AuthenticatedLayout,
}
</script>

<script setup>
import MiniLanding from "@/Components/MiniLanding.vue";
import { getCurrentInstance } from "vue";
import { defineProps, ref } from 'vue';
import DisplayReview from "@/Components/ViewReview.vue";

// Receive props from backend
const props = defineProps({
    adminReviews: Object
});

// Function to truncate the message to 20 characters
const truncateMessage = (message) => {
    return message.length > 20 ? message.substring(0, 20) + '...' : message;
};

let instance = getCurrentInstance()
let pageName =  instance.type.name

let  isHidden = ref('')


const isModalOpen = ref(false);
let selectedRequest = ref('')
const openModal = (review) => {
    selectedRequest.value = review;
    isModalOpen.value = true;
};

</script>
