<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientCard from '@/Components/ClientCard.vue'

const props = defineProps({
    clients: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight">
                Clients
            </h2>
        </template>
        <ClientCard :clients="clients"/>
    </AuthenticatedLayout>
</template>
