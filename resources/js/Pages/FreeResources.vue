<template>
    <section class=" text-white py-28 px-6 text-center flex items-center justify-center min-h-screen">
        <div class="w-full md:w-2/3">

            <h1 class="text-3xl md:text-5xl font-bold md:leading-[1.2]">
                FREE Resources and templates to help your

                <span
                    class="text-yellow-500"
                    style="font-family: 'Brush Script MT'"
                >design</span>

                business grow.
            </h1>

            <a href="#resourceCard">
                <button class="mt-8 bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-6 rounded-md font-bold " style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);">
                    Resources<span>&#x25BC;</span>
                </button>

            </a>
        </div>

    </section>
    <section>
        <h1 class="text-xl md:text-xl font-bold md:leading-[1.2] w-full text-center py-6">
            So far we've helped 1200 designers learn the all mighty tool.
        </h1>
        <ResourcesDisplay
            id="resourceCard"
        />
    </section>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ResourcesDisplay from "@/Components/ResourceDisplay.vue";

export default {
    name: "Courses",
    components: {ResourcesDisplay},
    layout: GuestLayout,
}
</script>

<style scoped>

</style>
