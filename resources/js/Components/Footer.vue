<template>
    <footer class="bg-white text-black py-10 px-6 sm:px-10">
        <!-- Newsletter Section -->
        <div class="text-center mb-6">
            <h3 class="text-lg font-bold mb-4">
                Want to <span class="text-yellow-500">learn</span> something new every week? Join my newsletter.
            </h3>
            <!-- Form -->
            <Subscribe />
        </div>

        <!-- Footer Details -->
        <div class=" text-center sm:flex sm:justify-between sm:items-center">
            <!-- Company Info -->
            <div class="flex items-start justify-start flex-col">

            <div class="text-sm mb-6 sm:mb-0 flex  flex-col items-start justify-start">
                <p>Creatively DRVN Limited (Abi Connick)</p>
                <p>Amelia House, Crescent Road, Worthing, England, BN11 1QR</p>
                <p>Copyright Creatively DRVN. All Rights Reserved 2024</p>
            </div>
                <div class="flex flex-col  w-2/3 my-2">
                    <a href="#" class="bg-black text-white px-4 py-2 rounded-md mb-2 text-center hover:bg-gray-800">
                        Privacy Policy
                    </a>
                    <a href="#" class="bg-black text-white px-4 py-2 rounded-md mb-2 text-center hover:bg-gray-800">
                        Terms and Conditions
                    </a>
                </div>
            </div>

            <!-- Social Media Icons -->
            <div class="flex justify-center mb-6 sm:mb-0">
                <a href="#" class="mx-3">
                    <img src="/path-to-instagram-icon.svg" alt="Instagram" class="h-6 w-6" />
                </a>
                <a href="#" class="mx-3">
                    <img src="/path-to-youtube-icon.svg" alt="YouTube" class="h-6 w-6" />
                </a>
            </div>

            <!-- Footer Links -->
            <div class="flex flex-col items-center sm:items-start">
                <a href="#" class="w-full bg-black text-white px-4 py-2 rounded-md text-center hover:bg-gray-800">
                    About
                </a>
                <a href="#" class="w-full bg-black text-white px-4 py-2 rounded-md mt-2 text-center hover:bg-gray-800">
                    Contact
                </a>
                <a href="#" class="w-full bg-black text-white px-4 py-2 rounded-md mt-2 text-center hover:bg-gray-800">
                    Design Work
                </a>
            </div>
        </div>
    </footer>
</template>

<script>
import Subscribe from "@/Components/Subscribe.vue";

export default {
    components: {Subscribe},
    data() {
        return {};
    },
};
</script>

<style scoped>
/* Add custom styles here if necessary */
</style>
