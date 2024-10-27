<template>
    <section class="relative h-fit py-12 bg-cover bg-center">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-2xl font-bold">{{pageName}}</h1>
        </div>
    </section>
</template>

<script>
export default {
    name: "MiniLanding"
}
</script>

<script setup>

import {defineProps} from "vue";
let props = defineProps({
    pageName: String,
})

</script>

<style scoped>

</style>
