<template>
    <section class=" text-white py-28 px-6 text-center flex items-center justify-center min-h-screen">
        <div class="w-full md:w-2/3">

            <h1 class="text-4xl md:text-6xl font-bold md:leading-[1.2]">
                Helping
                <span
                    class="text-yellow-500"
                    style="font-family: 'Brush Script MT'"
                >driven</span>

                designers hungry for creative success.
            </h1>
            <p class="text-lg md:text-2xl mt-6 max-w-3xl mx-auto text-gray-400 py-6 w-full md:w-2/3 ">
            Unlock your full creative potential and discover the strategies, systems, and secrets behind building a successful design business.
        </p>
            <a href="#helpCards">
                <button class="mt-8 bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-6 rounded-md font-bold " style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);">
                    How I can help you <span>&#x25BC;</span>
                </button>

            </a>
        </div>

    </section>
    <section class="w-full py-12">
            <AboutSection />
    </section>
    <section class="w-full">
            <HelpCards
            id="helpCards"
            />
    </section>
    <section
    class=""
    >
        <ClientReviews
        :reviews="props.reviews"
        />
    </section>
    <section>
        <BecomeABetterBrandDesigner />
    </section>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    layout: GuestLayout,
}
</script>
<script setup>
    import AboutSection from "@/Components/AboutSection.vue";
    import HelpCards from "@/Components/HelpCards.vue";
    import ClientReviews from "@/Components/ClientReviews.vue";
    import BecomeABetterBrandDesigner from "@/Components/BecomeABetterBrandDesigner.vue";

    let props = defineProps({
        reviews: Array
    })

</script>
