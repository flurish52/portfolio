<template>

    <section class=" text-white pt-24 px-6 text-center flex items-center justify-center">
        <div class="w-full md:w-2/3">

            <h1 class="text-3xl md:text-5xl font-bold">
                My portfolio
            </h1>
        </div>

    </section>
    <div
        id="resourceCard"
        class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-0 m-12">
        <div
            v-for="portfolio in portfolios"
            :key="portfolio.id"
            class="relative h-80 bg-gray-800 p-4 rounded-lg shadow-lg group cursor-pointer mb-6  overflow-hidden"
        >
            <Link :href="`/portfolio/${portfolio.slug}`">
            <!-- Default Image -->
                <div v-for="image in portfolio.images">
            <img
                :src="`/storage/portfolio_images/${image.hovered_image}`"
                :alt="portfolio.portfolio_name"
                class="w-full h-full object-cover rounded-lg transition-opacity duration-500 group-hover:opacity-0"
            />
            <!-- Hover Image -->
            <img
                :src="`/storage/portfolio_images/${image.default_image}`"
                :alt="portfolio.portfolio_name"
                class="absolute inset-0 w-full h-full object-cover rounded-lg opacity-0 transition-opacity duration-500 group-hover:opacity-100"
            />
            <!-- Title Overlay -->
            <div
                class="absolute inset-0 flex items-center justify-center flex-col bg-black bg-opacity-50 opacity-0 transition-opacity duration-500 group-hover:opacity-100"
            >
                <h3 class="text-white text-xl font-bold">{{ portfolio.portfolio_name }}</h3>
                <h3 class="text-white text-xl font-bold">{{ new Date(portfolio.created_at).toLocaleString('en-US', options) }}</h3>
            </div>
                </div>

            </Link>
        </div>
    </div>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    layout: GuestLayout,
}
</script>


<script setup>
import {Link} from "@inertiajs/vue3";
import axios from "axios";
import portfolio from "@/Pages/Portfolio.vue";

const props = defineProps({
    portfolios: Array,

})

// Example date fetched from the database
const createdAt = '2024-10-22T10:00:00Z';
const options = { month: 'long', year: 'numeric' };

</script>

<style>
/* Add any custom styles if necessary */
</style>
