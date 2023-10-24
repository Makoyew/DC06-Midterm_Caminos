<script setup>
import { defineProps, ref } from 'vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link } from '@inertiajs/vue3';
import { inject } from 'vue'

const DarkMode = inject('DarkMode')

const props = defineProps({
products: Object,
});
</script>

<template>
  <div>
    <Head title="Products" />
    <div class="py-8 mx-auto max-w-7xl" :class="[DarkMode ? 'text-gray-300' : 'text-gray-600']">
      <div class="shadow-sm sm:rounded-lg">
        <div class="flex justify-end mb-2">
          <Link href="products/create">
            <button
              v-if="$page.props.auth.user.permissions.includes('make-sales')"
              class="px-3 py-1 text-white bg-blue-500 border-2 border-solid rounded-lg hover:bg-blue-700 hover-border-blue-500"
            >
              Add Product
            </button>
          </Link>
        </div>
          <div class="overflow-x-auto" :class="[DarkMode ? 'bg-gray-700' : 'bg-gray-100']">
            <table class="w-full border border-collapse border-gray-300">
              <thead :class="[DarkMode ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700']">
                <tr>
                  <th class="px-4 py-2 font-medium text-left">Brand</th>
                  <th class="px-4 py-2 font-medium text-left">Product name</th>
                  <th class="px-4 py-2 font-medium text-left">Description</th>
                  <th class="px-4 py-2 font-medium text-left">Retail Price</th>
                  <th class="px-4 py-2 font-medium text-left">Stock</th>
                  <th class="px-4 py-2 font-medium text-left">Category</th>
                  <th class="px-4 py-2 font-medium text-left">Thumbnail</th>
                </tr>
              </thead>
              <tbody :class="[DarkMode ? 'bg-gray-700 text-white' : 'bg-gray-100 text-gray-700']">
                <tr v-for="product in products.data" :key="product.id">
                  <td class="px-4 py-2">{{ product.brand }}</td>
                  <td class="px-4 py-2">{{ product.name }}</td>
                  <td class="px-4 py-2">{{ product.description }}</td>
                  <td class="px-4 py-2">{{ product.retail_price }}</td>
                  <td class="px-4 py-2">{{ product.qty_stock }}</td>
                  <td class="px-4 py-2">{{ product.category_id }}</td>
                  <td class="px-4 py-2">
                    <div>
                      <img :src="product.thumbnail" @error="imageError" class="object-cover w-12 h-12 rounded" alt="Product image">
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <Pagination :links="products.links" class="flex justify-center mt-4" />
        </div>
      </div>
    </div>
  </template>
