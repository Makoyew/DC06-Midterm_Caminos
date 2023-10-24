<script setup>
  import { defineProps, ref } from 'vue';
  import { router } from '@inertiajs/vue3';
  import Pagination from '@/Components/Pagination.vue';
  import { inject } from 'vue';

  const DarkMode = inject('DarkMode')

const props = defineProps({
    clients: Object,
})

function open(client) {
    router.visit('/clients/' + client.id)
}
</script>

<template>
    <div class="p-8 mx-auto mt-4 container-md">
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        <div v-for="client in clients.data" :key="client.id" @click="open(client)" class="p-4 border-2 border-gray-400 rounded-lg shadow cursor-pointer hover:bg-gray-50 hover:border-blue-500">
          <div class="p-4 bg-white rounded-lg">
            <h3 class="mb-2 text-lg font-bold">{{ client.first_name }} {{ client.last_name }}</h3>
            <p class="mb-2 text-gray-700">Address: {{ client.address }}</p>
            <p class="mb-2 text-gray-700">Phone: {{ client.phone }}</p>
            <p class="text-gray-700">Credit Limit: {{ client.credit_limit }}</p>
          </div>
        </div>
      </div>

      <Pagination :links="clients.links" class="flex justify-center mt-6" :class="[DarkMode ? 'text-gray-200' : 'text-gray-600']" />
    </div>
  </template>

