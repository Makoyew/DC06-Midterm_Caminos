<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SalesComponent from '@/Components/SalesComponent.vue'
const props = defineProps({
    sales: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight">
                Sales
            </h2>
        </template>
        <SalesComponent :sales="sales"/>
    </AuthenticatedLayout>
</template>
