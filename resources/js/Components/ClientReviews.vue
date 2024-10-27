<template>
    <div class="relative  text-white py-10">
        <h2 class="text-center text-2xl font-bold mb-8">
            I have already helped <span class="text-yellow-500">thousands</span> of ambitious designers who are eager to grow. Now, it's your turn...
        </h2>
        
        <div class="relative max-w-5xl mx-auto">
            <!-- Left Arrow -->
            <button
                @click="prev"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 p-2 rounded-full hover:bg-blue-500 transition-colors"
            >
                <!-- Left Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Testimonial Cards -->
            <div class="overflow-hidden px-10">
                <div
                    class="flex transition-transform duration-500 ease-in-out space-x-4"
                    :style="{ transform: `translateX(-${activeIndex * 100}%)` }"
                >
                    <div
                        v-for="(review, index) in reviews"
                        :key="index"
                        class="min-w-full bg-transparent text-white p-6 rounded-md shadow-md"
                    >
                        <p class="text-lg bg-transparent">{{ review.message }}</p>
                        <p class="font-bold mt-4">{{ review.client_name }}</p>
                        <p class="text-sm mt-2">{{ review.company_role }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Arrow -->
            <button
                @click="next"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 p-2 rounded-full hover:bg-blue-500 transition-colors"
            >
                <!-- Right Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";

let props = defineProps({
    reviews: Array,
})

let activeIndex = ref(1)
let next = () => {
    if (props.reviews[activeIndex.value] < props.reviews.length - 1) {
        props.reviews[activeIndex.value]++;
    }
}

let prev = () => {
    if (props.reviews[activeIndex.value] > 0) {
        props.reviews[activeIndex.value]--;
    }
}

</script>
