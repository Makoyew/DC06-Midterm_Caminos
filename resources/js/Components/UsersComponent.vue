<script setup>
import { defineProps, ref } from 'vue';
import Pagination from '@/Components/Pagination.vue';
import { inject } from 'vue'

const DarkMode = inject('DarkMode')

const props = defineProps({
  users: Object,
});

</script>

<template>
    <Head title="Users" />
    <div class="py-8 mx-auto max-w-7xl" :class="[DarkMode ? 'bg-gray-200 text-gray-300' : 'text-gray-600']">
      <div class="shadow-sm sm:rounded-lg">
        <div class="p-4">
          <div class="overflow-x-auto" :class="[DarkMode ? 'bg-gray-700' : 'bg-gray-100']">
            <table class="w-full table-fixed">
              <thead :class="[DarkMode ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700']">
                <tr>
                  <th class="w-1/4 px-4 py-2 text-left">ID</th>
                  <th class="w-1/4 px-4 py-2 text-left">Name</th>
                  <th class="w-1/2 px-4 py-2 text-left">Email</th>
                </tr>
              </thead>
              <tbody :class="[DarkMode ? 'bg-gray-700 text-white' : 'bg-gray-100 text-gray-700']">
                <tr v-for="user in users.data" :key="user.id">
                  <td class="w-1/4 px-4 py-2">{{ user.id }}</td>
                  <td class="w-1/4 px-4 py-2">{{ user.name }}</td>
                  <td class="w-1/2 px-4 py-2">{{ user.email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <Pagination :links="users.links" class="flex justify-center mt-4" />
        </div>
      </div>
    </div>
  </template>



