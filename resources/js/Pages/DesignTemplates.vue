<template>
    <div class="">
    <section class=" text-white py-28 px-6 text-center flex items-center justify-center min-h-screen w-full">
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl md:text-5xl font-bold md:leading-[1.2]">
                Instantly develop a professional design process with
                <span
                    class="text-yellow-500"
                    style="font-family: 'Brush Script MT'"
                >premium</span>

                Templates
            </h1>
            <p class="text-lg md:text-2xl mt-6 max-w-3xl mx-auto text-gray-400 py-6 w-full md:w-2/3 ">
                Unlock your full creative potential and discover the strategies, systems, and secrets behind building a successful design business.
            </p>
            <a href="#templates">
                <button class="mt-8 bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-6 rounded-md font-bold " style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);">
                    Design Templates <span>&#x25BC;</span>
                </button>

            </a>
        </div>
    </section>
        <section>
            <ClientReviews />
        </section>
        <section>
            <ProductsDisplay
            id="templates"
            />
        </section>
    </div>

</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    name: "DesignTemplates",
    layout: GuestLayout
}
</script>

<script setup>
import ClientReviews from "@/Components/ClientReviews.vue";
import ProductCard from "@/Components/ProductCard.vue";
import ProductsDisplay from "@/Components/ProductsDisplay.vue";

</script>
