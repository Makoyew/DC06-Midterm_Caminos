<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AddProductComponent from '@/Components/AddProductComponent.vue'
const props = defineProps({
    products: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight">
                Add Products
            </h2>
        </template>
        <AddProductComponent :products="products"/>
    </AuthenticatedLayout>
</template>
