<template>
    <MiniLanding
    :pageName = "pageName"
    />
        <div class="overflow-x-auto">
            <table class="min-w-full bg-teal-100">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">Full Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Telephone</th>
                    <th class="py-2 px-4">Message</th>
                    <th class="py-2 px-4">Read</th>
                    <th class="py-2 px-4">Date</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="hireRequest in hireMeRequests" :key="hireRequest.id" class=" text-gray-800 border-b rounded-md"
                    :class="{'read': hireRequest.read, 'font-bold bg-yellow-500': !hireRequest.read}"
                >

                    <td class="py-2 px-4">{{ hireRequest.fullname }}</td>
                    <td class="py-2 px-4">{{ hireRequest.email }}</td>
                    <td class="py-2 px-4">{{ hireRequest.telephone || 'N/A' }}</td>
                    <td class="py-2 px-4">{{ truncateMessage(hireRequest.message) }}</td>
                    <td class="py-2 px-4">{{ new Date(hireRequest.created_at).toLocaleString() }}</td>
                    <td class="py-4 px-6 ">
                        <select
                            v-model="hireRequest.read"
                            @change="handleSelectChange($event, hireRequest)"
                            class="bg-transparent outline-none border-0 focus:outline-none focus:border-0" name="" id="">Mark as
                            <option
                                selected
                                class="outline-none border-0 focus:outline-none focus:border-0"
                            >Mark as</option>

                            <option
                                class=" outline-none border-0 focus:outline-none focus:border-0"
                                :value="1" :selected="hireRequest.read === 1">Read</option>
                            <option
                                class=" outline-none border-0 focus:outline-none focus:border-0"
                                :value="0" :selected="hireRequest.read === 0">Unread</option>
                        </select>
                    </td>
                    <td class="py-2 px-4">
                        <button
                            @click="openModal(hireRequest)"
                            class="bg-slate-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-teal-700 focus:outline-none"
                        >
                            View details
                        </button>
                    </td>
    <DisplayMessage
        :isOpen="isModalOpen"
        :hireMeRequest="hireRequest"
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
    name: "Hire me requests",
    layout: AuthenticatedLayout,
}
</script>

<script setup>
import MiniLanding from "@/Components/MiniLanding.vue";
import { getCurrentInstance } from "vue";
import { defineProps, ref } from 'vue';
import DisplayMessage from "@/Components/DisplayMessage.vue";

// Receive props from backend
const props = defineProps({
    hireMeRequests: Object
});

// Function to truncate the message to 20 characters
const truncateMessage = (message) => {
    return message.length > 20 ? message.substring(0, 20) + '...' : message;
};

let instance = getCurrentInstance()
let pageName =  instance.type.name

let  isHidden = ref('')
let  requestToReply = ref('')
let toggleReply = (hireRequest) => {
    requestToReply = hireRequest
    try {
        axios.patch(`/request-status/${hireRequest.id}`, {
            read: true
        });
    } catch (error) {
        alert('Error updating read status:', error);
    }
    // isHidden.value = !isHidden.value;
};


let handleSelectChange = (event, request) => {
    const selectedValue = event.target.value;
    markAsReadOrUnread(selectedValue, request);
};

let markAsReadOrUnread = async (status, request) => {
    try {
       await axios.patch(`/request-status/${request.id}`, {
            read: status === 1 ? true : false,
        });
    } catch (error) {
        alert('Error updating read status:', error);
    }
};

const isModalOpen = ref(false);
const selectedRequest = ref(null);

const openModal = (request) => {
    selectedRequest.value = request;
    isModalOpen.value = true;
};

</script>
