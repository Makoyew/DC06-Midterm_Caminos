<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UsersComponent from '@/Components/UsersComponent.vue'
const props = defineProps({
    users: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight">
                Users
            </h2>
        </template>
        <UsersComponent :users="users"/>
    </AuthenticatedLayout>
</template>
