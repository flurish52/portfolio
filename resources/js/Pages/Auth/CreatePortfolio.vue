<template>
    <form @submit.prevent="submitForm" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input v-model="form.portfolio_name" id="name" type="text" placeholder="Name" required
                   class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea v-model="form.description" id="description" placeholder="Description"
                      class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm"></textarea>
        </div>

        <!-- Default Avatar -->
        <div class="mb-4">
            <label for="default_avatar" class="block text-sm font-medium text-gray-700">Default Avatar</label>
            <input @change="handleFileUpload('default_avatar', $event)" name="default_avatar" id="default_avatar" type="file" accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
        </div>

        <!-- Hover Avatar -->
        <div class="mb-4">
            <label for="hover_avatar" class="block text-sm font-medium text-gray-700">Hover Avatar</label>
            <input @change="handleFileUpload('hover_avatar', $event)" name="hover_avatar" id="hover_avatar" type="file" accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
        </div>

        <!-- Portfolio Properties -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Portfolio Properties</label>
            <div v-for="(property, index) in form.portfolio_properties" :key="index" class="mt-1">
                <input v-model="form.portfolio_properties[index]" type="text" placeholder="Property"
                       class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm mb-2">
            </div>
            <button type="button" @click="addPortfolioProperty" class="bg-teal-500 text-white py-2 px-4 rounded-lg hover:bg-teal-400">
                Add Property
            </button>
            <button type="button" @click="removePortfolioProperty" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-400">
                Delete Property field
            </button>
        </div>

        <!-- File Types -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">File Types</label>
            <div v-for="(fileType, index) in form.file_types" :key="index" class="mt-1">
                <input v-model="form.file_types[index]" type="text" placeholder="File Type"
                       class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm mb-2">


            </div>
            <button type="button" @click="addFileType" class="bg-teal-500 text-white py-2 px-4 rounded-lg hover:bg-teal-400">
                Add File Type Field
            </button>
            <button type="button" @click="removeFileType" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-400">
                Remove File Type Field
            </button>
        </div>

        <!-- Portfolio Images (Multiple Uploads) -->
        <div class="mb-4">
            <label for="portfolio_images" class="block text-sm font-medium text-gray-700">Portfolio Images</label>
            <input @change="handleMultipleFileUpload" id="portfolio_images" name="portfolio_images" type="file" accept="image/*" multiple
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-yellow-700 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-300">
                Submit
            </button>
        </div>
    </form>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    layout: AuthenticatedLayout,
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';
import {ref} from "vue";

let form = useForm({
    portfolio_name: '',
    slug: '',
    description: '',
    default_avatar: {},
    hover_avatar: {},
    portfolio_properties: [''],
    file_types: [''],
    portfolio_images: []
});

const handleFileUpload = (field, event) => {
    form[field] = event.target.files[0];
};

const handleMultipleFileUpload = (event) => {
    form.portfolio_images = Array.from(event.target.files);  // Handles multiple image uploads
};

const addPortfolioProperty = () => {
    form.portfolio_properties.push('');
};

const removePortfolioProperty = () => {
    form.portfolio_properties.push('');
};

const addFileType = () => {
    form.file_types.push('');
};

const removeFileType = () => {
    form.file_types.pop('');
};
function generateSlug(text) {
    return text
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
}
const submitForm = () => {

    form.slug = generateSlug(form.portfolio_name)
    form.post('/portfolio/create/new')
        .onFinish = form.reset();
};


</script>
