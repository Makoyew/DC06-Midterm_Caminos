<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    links: Array
})

</script>

<template>
    <div>
      <Link
        :is="link.url ? 'Link' : 'span'"
        v-for="link in links"
        :href="link.url"
        v-html="link.label"
        class="px-1 text-sm hover:text-blue-900"
        :class="{
          'text-gray-200': !link.url,
          'font-bold': link.active,
          'cursor-pointer': link.url
        }"
      />
    </div>
  </template>
