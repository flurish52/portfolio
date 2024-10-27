<template>
    <div class=" text-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center flex flex-col items-center justify-center">
            <!-- Main Heading -->
            <h2 class="w-full md:w-1/2 text-3xl font-extrabold sm:text-4xl mb-4">
                Become a <span class="text-yellow-500">better</span> brand designer
                in just 5 minutes per week.
            </h2>

            <!-- Subheading -->
            <p class="max-w-md mx-auto text-lg mb-6">
                Join 19,000+ driven designers receiving weekly tips, strategies, and resources to launch and grow their design business.
            </p>
                <Subscribe />
        </div>
    </div>
</template>

<script>
export default {

};
</script>

<script setup>
    import Subscribe from "@/Components/Subscribe.vue";
</script>

<style scoped>
/* Add any custom styles if needed */
</style>
