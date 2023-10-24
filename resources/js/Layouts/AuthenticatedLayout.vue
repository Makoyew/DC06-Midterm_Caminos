<script setup>
import { ref, provide, watch } from 'vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import NavLink from '@/Components/NavLink.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import { Link } from '@inertiajs/vue3'

const showingNavigationDropdown = ref(false);

const storedTheme = localStorage.getItem('DarkMode');
const DarkMode = ref(storedTheme !== null ? JSON.parse(storedTheme) : false);

watch(DarkMode, (newValue) => {
  localStorage.setItem('DarkMode', newValue);
});

provide('DarkMode', DarkMode)
</script>


<template>
    <div>
        <div :class="[ DarkMode ? 'min-h-screen bg-gray-800' : 'min-h-screen bg-gray-100' ]">
            <nav :class="[DarkMode ? 'bg-dark border-b border-gray-700' : 'bg-white border-b border-gray-100']">
                <!-- Primary Navigation Menu -->
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex items-center shrink-0">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                    :class="[DarkMode ? 'block h-9 w-auto fill-current text-white' : 'block h-9 w-auto fill-current text-gray-800' ]"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :class="DarkMode ? 'text-white' : 'text-gray-800'" :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink :class="DarkMode ? 'text-white' : 'text-gray-800'" :href="route('products')" :active="route().current('products')">
                                    Products
                                </NavLink>
                                <NavLink :class="DarkMode ? 'text-white' : 'text-gray-800'" v-if="$page.props.auth.user.permissions.includes('make-sales')" :href="route('sales.index')" :active="route().current('sales.index')">
                                    Sales
                                </NavLink>
                                <NavLink :class="DarkMode ? 'text-white' : 'text-gray-800'" v-if="$page.props.auth.user.permissions.includes('manage')" :href="route('clients')" :active="route().current('clients')">
                                    Clients
                                </NavLink>
                                <NavLink :class="DarkMode ? 'text-white' : 'text-gray-800'" v-if="$page.props.auth.user.permissions.includes('manage-users')" :href="route('users')" :active="route().current('users')">
                                    Users
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="relative inline-flex items-center ml-3">
                                <div class="p-5">
                                    <div class="flex items-center justify-start">
                                        <label for="darkModeToggle" class="flex items-center cursor-pointer">
                                            <div class="relative">
                                                <input id="darkModeToggle" type="checkbox" class="sr-only" v-model="DarkMode" @change="updateDarkMode" />
                                                <div class="flex items-center justify-center w-10 h-10">
                                                    <span class="text-gray-700">
                                                        <i v-if="DarkMode" class="fas fa-moon"></i>
                                                        <i v-else class="fas fa-sun"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="flex items-center -mr-2 sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
                            >
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                        </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header :class="[ DarkMode ? 'bg-gray-900' : 'bg-white shadow' ]">
                <div :class="[ DarkMode ? 'max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white' : 'max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8' ]">
                    <slot :class="[ DarkMode ? 'bg-white text-black uppercase text-sm leading-normal' : 'bg-gray-900 text-white uppercase text-sm leading-normal' ]" name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
