<template>
       <div class="max-w-md p-6 mx-auto mt-8 border rounded-lg" :class="[ DarkMode ? 'bg-gray-900 border-gray-800 shadow-white shadow-sm' : 'bg-gray-100 border-gray-200 shadow-2xl' ]">
            <form @submit.prevent="addProduct" enctype="multipart/form-data">
                <div>
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="brand">
                        Brand
                    </label>
                    <input :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" class="w-full px-3 py-2 leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="brand" type="text" placeholder="Brand" v-model="form.brand">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="name">
                        Name
                    </label>
                    <input :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" class="w-full px-3 py-2 leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" v-model="form.name">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="description">
                        Description
                    </label>
                    <textarea :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" class="w-full h-24 px-3 py-2 leading-tight border rounded shadow appearance-none resize-none focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Enter the product description..." v-model="form.description"></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="retail">
                        Retail Price
                    </label>
                    <input :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" class="w-full px-3 py-2 leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="retail" type="number" placeholder="Retail Price" v-model="form.retail">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="stock">
                        Stock
                    </label>
                    <input :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" class="w-full px-3 py-2 leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="stocks" type="number" placeholder="Stocks" v-model="form.stocks">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="category">
                        Category
                    </label>
                    <input :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" class="w-full px-3 py-2 leading-tight border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="category" type="text" placeholder="Category" v-model="form.category">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-bold" :class="[ DarkMode ? 'text-gray-200' : 'text-gray-600' ]" for="thumbnail">
                        Thumbnail
                    </label>
                    <input :class="[ DarkMode ? 'bg-gray-400 text-white' : 'bg-gray-100 text-gray-700' ]" type="file" id="thumbnail" @change="onFileChange" class="w-full px-2 py-2 border rounded focus:outline-none focus:border-green-500">
                </div>
                <div class="flex items-center justify-between">
                    <button class="w-full px-4 py-2 font-bold text-white transition duration-150 ease-in-out bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
                        Add
                    </button>
                </div>
            </form>
        </div>
</template>

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'
import { inject } from 'vue'

const DarkMode = inject('DarkMode')

// Define reactive form variables
const form = ref({
    brand: '',
    name: '',
    description: '',
    thumbnail: null,
});

// Function to handle file changes
function onFileChange(e) {
    form.value.thumbnail = e.target.files[0];
}

const addProduct = () => {
    const formData = new FormData();
    formData.append('brand', form.value.brand);
    formData.append('name', form.value.name);
    formData.append('description', form.value.description);
    formData.append('thumbnail', form.value.thumbnail);

    router.post('/products', formData, {
        onSuccess: () => {
            form.value.brand = '';
            form.value.name = '';
            form.value.description = '';
            form.value.thumbnail = null;
        },
    });
};

</script>
