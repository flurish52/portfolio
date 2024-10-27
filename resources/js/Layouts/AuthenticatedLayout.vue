<template>
    <div class="flex min-h-screen">
        <!-- Mobile Menu Button -->
        <div class="lg:hidden fied top-4 left-4 z-50">
            <button @click="toggleSidebar" class="absolute top-0 left-0 text-white p-3 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>

            </button>
        </div>

        <!-- Sidebar (Hidden on Mobile, Fixed on Desktop) -->
        <aside
            :class="[
        'border-teal-700 w-64 bg-slate-800 text-white fixed h-full shadow-lg transition-transform lg:translate-x-0',
        sidebarOpen ? 'translate-x-0' : '-translate-x-full'
      ]"
            @click.outside="closeSidebar"
        >
            <div class="p-6 border-b border-white">
                <h1 class="text-2xl font-semibold">Admin Panel</h1>
            </div>
            <nav class="mt-2 border-white">
                <ul class="space-y-2">
                    <li>
                                <PortfolioLink :navLinks="navLinks" />

                        <button
                            class="bg-red-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-teal-700 focus:outline-none"
                        >
                            Log Out
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6 lg:ml-64 bg-slate-600 text-yellow-500">
            <MiniNav />
            <slot>

            </slot>
        </main>
    </div>
</template>


<script setup>
import MiniNav from "@/Components/MiniNav.vue";
import Portfolio from "@/Pages/Portfolio.vue";
import PortfolioLink from "@/Components/PortfolioLink.vue";
</script>
<script>

import Courses from "@/Pages/Courses.vue";

export default {
    data() {
        return {
            sidebarOpen: true, // Sidebar toggle state
        };
    },
    methods: {
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
        },
        closeSidebar() {
            this.sidebarOpen = false;
        },
        logout() {
            console.log('Logging out...');
        },
    },
};


const navLinks = [
    { name: 'Home', path: '/dashboard' },
    { name: 'Hire Me Request', path: '/hire-me' },
    {
        name: 'Courses',
        sublinks: [
            { name: 'View Courses', path: '/courses/view' },
            { name: 'Create Course', path: '/courses/create' }
        ]
    },
    {
        name: 'Design Templates',
        sublinks: [
            { name: 'View Templates', path: '/templates/view' },
            { name: 'Create Design Template', path: '/templates/create' }
        ]
    },
    {
        name: 'Free Resources',
        sublinks: [
            { name: 'View Resource', path: '/resources/view' },
            { name: 'Create Resource', path: '/resources/create' }
        ]
    },
    {
        name: 'Portfolio',
        sublinks: [
            { name: 'View Portfolio', path: '/portfolio/view' },
            { name: 'Create Portfolio', path: '/portfolio/create/new' }
        ]
    },
    {
        name: 'All Users',
        sublinks: [
            { name: 'View Users', path: '/users/view' },
            { name: 'Create User', path: '/users/create' }
        ]
    },
    {
        name: 'Client Reviews',
        sublinks: [
            { name: 'All Reviews', path: '/reviews/all' },
            { name: 'Create a Review', path: '/reviews/create' }
        ]
    },
    { name: 'Subscribers', path: '/subscribers' },
    { name: 'About Me', path: '/about' },
];

</script>

<style scoped>
.click-outside {
    /*position: fixed;*/
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999; /* Overlay to manage outside clicks */
}
</style>
