<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import DashboardComponent from '@/Components/DashboardComponent.vue';
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">Dashboard</h2>
        </template>
        <DashboardComponent />
    </AuthenticatedLayout>
</template>
