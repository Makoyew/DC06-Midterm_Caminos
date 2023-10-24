<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProductsComponent from '@/Components/ProductsComponent.vue'
const props = defineProps({
    products: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight">
                Products
            </h2>
        </template>
        <ProductsComponent :products="products"/>
    </AuthenticatedLayout>
</template>
