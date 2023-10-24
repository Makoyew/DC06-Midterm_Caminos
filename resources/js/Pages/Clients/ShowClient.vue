<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientShowComponent from '@/Components/ClientShowComponent.vue'
const props = defineProps({
    client: Object,
    transactions: Array
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight">
                Client Information
            </h2>
        </template>
        <ClientShowComponent :client="client" :transactions="transactions"/>
    </AuthenticatedLayout>
</template>
