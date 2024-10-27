<template>
    <div class="w-64 bg-gray-800 text-white h-screen overflow-y-auto">
        <ul class="p-4">
            <li v-for="link in navLinks" :key="link.name" class="mb-2">
                <div v-if="link.sublinks">
                    <button
                        @click="toggle(link.name)"
                        class="w-full flex justify-between items-center px-4 py-2 text-left bg-gray-700 hover:bg-gray-600 focus:outline-none focus:bg-gray-600 rounded"
                    >
                        <span>{{ link.name }}</span>
                        <svg
                            :class="{'rotate-180': isOpen(link.name)}"
                            class="w-4 h-4 transform transition-transform"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul v-show="isOpen(link.name)" class="pl-8 mt-2 space-y-2">
                        <li v-for="sublink in link.sublinks" :key="sublink.name">
                            <Link :href="sublink.path" class="block py-1 hover:underline">{{ sublink.name }}</Link>
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <Link :href="link.path" class="block px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded">{{ link.name }}</Link>
                </div>


            </li>
            <button
                @click="logout"
                class="bg-red-600 w-full text-white font-bold py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none"
            >
                Log Out
            </button>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import {Link} from "@inertiajs/vue3";
// Accept navLinks as a prop
const props = defineProps({
    navLinks: {
        type: Array,
        required: true
    }
});

const openedLinks = ref([]);

const toggle = (linkName) => {
    if (openedLinks.value.includes(linkName)) {
        openedLinks.value = openedLinks.value.filter(name => name !== linkName);
    } else {
        openedLinks.value.push(linkName);
    }
};

const isOpen = (linkName) => {
    return openedLinks.value.includes(linkName);
};

let logout = () =>{
    axios.post('/logout')
}
</script>
