<script setup>
import { inject } from 'vue'

const DarkMode = inject('DarkMode')
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" :class="[ DarkMode ? 'bg-gray-900' : 'bg-white' ]">
                <div class="p-6 transition duration-100 ease-in-out" :class="[ DarkMode ? 'text-gray-100' : 'text-gray-900' ]">You've been logged in.</div>
            </div>
        </div>
    </div>
</template>
