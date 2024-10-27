<template>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
            <div v-for="(card, index) in cards" :key="index" class="border rounded-lg p-4 shadow-lg h-fit flex flex-col items-between justify-between">
                <img :src="card.imageUrl" class="rounded-lg mb-4" :alt="card.title" />
                <h2 class="text-lg font-semibold mb-2 text-black">{{ card.title }}</h2>
                <p class="text-gray-600 text-sm mb-4 overflow-hidden h-12 py-2">{{ card.description }}</p>
                <button class="w-full bg-yellow-200 text-yellow-800 hover:bg-yellow-600 font-semibold py-2 rounded-lg">
                    Get it now
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardComponent",
    data() {
        return {
            cards: [
                {
                    imageUrl: "https://via.placeholder.com/500",
                    title: "Pencil Tool Worksheet",
                    description:
                        "Updated for 2024! Redefine what's possible on Adobe Illustrator with my Pencil Tool exercise sheets. Learn the ins and outs of customizing typography, illustrations, and much more!",
                    buttonText: "Get it now",
                },
                {
                    imageUrl: "https://via.placeholder.com/300",
                    title: "Pencil Tool Worksheet",
                    description:
                        "Updated for 2024! Redefine what's possible on Adobe Illustrator with my Pencil Tool exercise sheets. Learn the ins and outs of customizing typography, illustrations, and much more!",
                    buttonText: "Get it now",
                },
                {
                    imageUrl: "https://via.placeholder.com/300",
                    title: "Typography Masterclass",
                    description:
                        "Learn advanced typography techniques with these exercises. Master font pairing, kerning, and more to create stunning designs!",
                    buttonText: "Learn More",
                },
                {
                    imageUrl: "https://via.placeholder.com/300",
                    title: "Illustration Guide",
                    description:
                        "Explore various illustration styles and techniques with this comprehensive guide. Ideal for beginners and professionals alike.",
                    buttonText: "Explore",
                },                {
                    imageUrl: "https://via.placeholder.com/300",
                    title: "Illustration Guide",
                    description:
                        "Explore various illustration styles and techniques with this comprehensive guide. Ideal for beginners and professionals alike.",
                    buttonText: "Explore",
                },
            ],
        };
    },
};
</script>

<style scoped>
</style>
