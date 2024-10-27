<template>
    <div class="p-6">
        <!-- Job Name -->

        <h2 class="text-xl font-bold text-gray-300 pt-16 mb-4 text-center uppercase">{{ props.project.portfolio_name}}</h2>

        <p class="text-sm text-gray-300 text-center mb-4 leading-relaxed">
            {{props.project.description}}
        </p>
        <!-- Job Properties -->
        <ul class="text-sm text-gray-300 text-center mb-4 leading-relaxed">
            <h2 class="text- font-bold text-gray-300 mt-4 text-center uppercase">Portfolio Properties</h2>


            <li v-for="(property, index) in properties" :key="index">{{ property.property }}</li>
        </ul>
        <!-- Job Properties -->
        <ul class="text-sm text-gray-300 text-center mb-4 leading-relaxed">
            <h2 class="text- font-bold text-gray-300 mt-4 text-center uppercase">Available file types</h2>

            <li v-for="(fileType, index) in fileTypes" :key="index">{{ fileType.file_type }}</li>
        </ul>

<!--        Project images-->
        <div class="flex  w-full justify-center mb-4 md:py-12 "
             v-for="(image, index)  in images"
             :key="index"
        >
            <img
                :src="`/storage/portfolio_images/${image.default_image}`"

                alt="Mockup Image"
                 class="rounded-lg shadow-lg w-full md:w-1/2 h-auto">
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between">
<!--            <button-->
<!--                @click="prevImage"-->
<!--                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800 transition"-->
<!--            >-->
<!--                Previous-->
<!--            </button>-->

<!--            <button-->
<!--                @click="nextImage"-->
<!--                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800 transition"-->
<!--            >-->
<!--                Next-->
<!--            </button>-->
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
import { ref, computed } from 'vue'
import {onMounted} from "vue";

// Data for Projects/mockup
let props = defineProps({
    project: Object,
    images: Array,
    fileTypes: Array,
    properties: Array,
})

let file_paths = ref([])

const currentImageIndex = ref(0);
let currentImage = ref()
//
onMounted(() => {
    file_paths.value = props.images.map(image => image.file_path);
    currentImage.value = file_paths.value[currentImageIndex.value];
});

// // Image navigation logic
const nextImage = () => {

    if (currentImageIndex.value < file_paths.value) {
        console.log(currentImageIndex.value)
        currentImageIndex.value+=1
    }
}

const prevImage = () => {
    if (currentImageIndex.value > 0) {
        currentImageIndex.value=-1
        console.log(currentImageIndex.value)

    }
}


</script>

<style scoped>
/* Add any custom styles if needed */
</style>

