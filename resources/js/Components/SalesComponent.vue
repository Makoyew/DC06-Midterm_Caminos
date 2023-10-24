<template>
    <Head title="Sales" />
    <div class="py-8 mx-auto max-w" :class="[DarkMode ? 'bg-gray-200 text-gray-300' : 'text-gray-600']">
      <div class="overflow-x-auto" :class="[DarkMode ? 'bg-gray-900' : 'bg-gray-100']">
        <div class="max-w-3xl mx-auto">
          <table class="w-full table-auto">
            <thead>
              <tr :class="[DarkMode ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700']">
                <th class="px-4 text-left text-md">Sale ID</th>
                <th class="px-4 text-left text-md">Date</th>
                <th class="px-4 text-left text-md">Client ID</th>
                <th class="px-4 text-left text-md">Is Credit</th>
                <th class="px-4 text-left text-md">Actions</th>
              </tr>
            </thead>
            <tbody :class="[DarkMode ? 'bg-gray-700 text-white' : 'bg-gray-100 text-gray-900']">
              <tr v-for="sale in sales.data" :key="sale.id">
                <td class="px-4 py-2">{{ sale.id }}</td>
                <td class="px-4">{{ sale.date }}</td>
                <td class="px-4">{{ sale.client_id }}</td>
                <td class="px-4">{{ sale.is_credit ? 'Yes' : 'No' }}</td>
                <td class="px-4">
                  <button class="text-red-600 hover:text-red-700">
                    Delete
                  </button>
                        <button class="ml-2 text-green-600 hover:text-green-700">
                            Edit
                        </button>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <Pagination :links="sales.links" class="flex justify-center mt-4" />
        </div>
        </div>
  </template>

  <script setup>
  import { defineProps, ref } from 'vue';
  import Pagination from '@/Components/Pagination.vue';
  import { inject } from 'vue'

  const DarkMode = inject('DarkMode')


  const props = defineProps({
    sales: Object,
  });

</script>


