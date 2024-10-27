<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />
                    <div class=" p-6">
                        You're logged in!
                    </div>
</template>


<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    layout: AuthenticatedLayout
}
</script>
