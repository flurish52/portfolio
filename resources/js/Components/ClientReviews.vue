<template>
    <div id="controls-carousel" class="relative w-full flex flex-col justify-center items-center" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class=" relative flex items-center justify-center px-12 w-1/2 h-full overflow-hidden rounded-lg md:h-44">
            <div
                v-for="(review, index) in props.reviews"
                :key="index"
                class="duration-700 ease-in-out flex justify-center items-center text-white font-bold"
                :class="{'hidden': index !== 0}"
            data-carousel-item
            >
                <div class="w-full px-12">
                <p>{{ review.message }}</p>
                <p>{{ review.client_name }}</p>
                <p>{{ review.company_role }}</p>
                </div>
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
    </button>
    </div>
</template>

<script setup>
import { defineProps } from "vue";

let props = defineProps({
    reviews: {
        type: Array,
        required: true,
    },
});
</script>
