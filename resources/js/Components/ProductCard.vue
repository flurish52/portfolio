<template>
    <div class="container mx-auto py-8">
        <!-- Product Card Wrapper -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div
                v-for="(product, index) in products"
                :key="index"
                class="group relative bg-white border rounded-lg shadow-md overflow-hidden"
            >
                <!-- Product Image -->
                <div class="relative">
                    <img
                        :src="product.image"
                        :alt="product.name"
                        class="w-full h-56 object-cover"
                    />
                    <!-- Quick View Button on Hover -->
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out"
                    >
                        <button
                            class="bg-white text-black py-2 px-4 rounded-md shadow hover:bg-gray-200 overflow-hidden"
                        >
                            Quick View
                        </button>
                    </div>
                    <!-- Download Button at Top Right -->
                    <div class="absolute top-2 right-2">
                        <button
                            class="bg-gray-200 p-2 rounded-full hover:bg-gray-300"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M16 12l-4 4m0 0l-4-4m4 4V4" />
                            </svg>


                        </button>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ product.name }}</h3>
                    <p class="text-gray-700 w-fit px-1 relative double-strike text-gray-800">{{ product.regular_price }}</p>
                    <p class="text-gray-700">{{ product.price }}</p>
                </div>

                <!-- Add to Cart Button -->
                <div class="px-4 pb-4">
                    <button
                        class="w-full border border-black text-black py-2 rounded-md hover:bg-black hover:text-white transition"
                    >
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [
                {
                    regular_price: '£100.00',
                    name: 'Project Proposal Kit',
                    price: '£69.00',
                    image: 'https://via.placeholder.com/300',
                },            {
                    regular_price: '£100.00',
                    name: 'Project Proposal Kit',
                    price: '£69.00',
                    image: 'https://via.placeholder.com/300',
                },            {
                    regular_price: '£100.00',
                    name: 'Project Proposal Kit',
                    price: '£69.00',
                    image: 'https://via.placeholder.com/300',
                },            {
                    regular_price: '£100.00',
                    name: 'Project Proposal Kit',
                    price: '£69.00',
                    image: 'https://via.placeholder.com/300',
                },
            ],
        };
    },
};
</script>


<style>
.double-strike::before,
.double-strike::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    height: 1px;
    background-color: currentColor;
}

.double-strike::before {
    top: 40%;
}

.double-strike::after {
    bottom: 40%;
}
</style>
