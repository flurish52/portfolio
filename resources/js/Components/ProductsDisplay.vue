<template>

    <div class="flex items-start justify-start flex-wrap">
        <ProductCard />
    </div>

</template>

<script>
import ProductCard from "@/Components/ProductCard.vue";

export default {
    name: "ProductsDisplay",
    components: {ProductCard}
}
</script>

<style scoped>

</style>
