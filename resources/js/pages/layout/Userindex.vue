<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <!-- Header Section -->
            <div class="mb-8 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Kelola Pengguna</h1>
                    <p class="mt-2 text-gray-600">Kelola semua pengguna dalam sistem</p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Search Bar -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                ></path>
                            </svg>
                        </div>
                        <input
                            v-model="searchQuery"
                            type="text"
                            placeholder="Cari pengguna..."
                            class="rounded-lg border-2 border-gray-200 bg-white py-2 pr-4 pl-10 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none"
                        />
                    </div>
                    <!-- Add User Button -->
                    <Link
                        :href="route('users.create')"
                        class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:from-blue-600 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500/50 focus:outline-none"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah User
                    </Link>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-2xl font-bold text-gray-900">{{ filteredUsers.length }}</p>
                        </div>
                        <div class="rounded-lg bg-blue-100 p-3">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Admin</p>
                            <p class="text-2xl font-bold text-gray-900">{{ getUsersByRole('admin').length }}</p>
                        </div>
                        <div class="rounded-lg bg-purple-100 p-3">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Kader</p>
                            <p class="text-2xl font-bold text-gray-900">{{ getUsersByRole('kader').length }}</p>
                        </div>
                        <div class="rounded-lg bg-green-100 p-3">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Regular Users</p>
                            <p class="text-2xl font-bold text-gray-900">{{ getUsersByRole('user').length }}</p>
                        </div>
                        <div class="rounded-lg bg-orange-100 p-3">
                            <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-gray-200">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">Daftar Pengguna</h2>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">{{ filteredUsers.length }} pengguna</span>
                            <div class="h-1 w-1 rounded-full bg-gray-300"></div>
                            <span class="text-sm text-gray-500">{{ props.users.length }} total</span>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase">
                            <tr>
                                <th class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            ></path>
                                        </svg>
                                        Nama
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                            ></path>
                                        </svg>
                                        Email
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                            ></path>
                                        </svg>
                                        Role
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                                            ></path>
                                        </svg>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr v-for="user in filteredUsers" :key="user.id" class="group transition-all duration-150 hover:bg-blue-50/50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-sm font-semibold text-white"
                                        >
                                            {{ user.name.charAt(0).toUpperCase() }}
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ user.name }}</div>
                                            <div class="text-xs text-gray-500">ID: {{ user.id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-900">{{ user.email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full px-3 py-1 text-xs font-semibold"
                                        :class="getRoleBadgeClass(user.role)"
                                    >
                                        {{ getRoleIcon(user.role) }}
                                        {{ user.role.charAt(0).toUpperCase() + user.role.slice(1) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <Link
                                            :href="route('users.edit', user.id)"
                                            class="group/btn flex items-center gap-1 rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-medium text-blue-700 transition-all duration-150 hover:bg-blue-200 hover:text-blue-800"
                                        >
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                ></path>
                                            </svg>
                                            Edit
                                        </Link>
                                        <button
                                            @click="confirmDelete(user)"
                                            class="group/btn flex items-center gap-1 rounded-lg bg-red-100 px-3 py-1.5 text-xs font-medium text-red-700 transition-all duration-150 hover:bg-red-200 hover:text-red-800"
                                        >
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                ></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Enhanced Delete Modal -->
        <div v-if="selectedUser" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
            <div class="mx-4 w-full max-w-md transform rounded-2xl bg-white p-6 shadow-2xl ring-1 ring-gray-200 transition-all">
                <div class="text-center">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100">
                        <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"
                            ></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold text-gray-900">Konfirmasi Penghapusan</h3>
                    <p class="mb-6 text-gray-600">
                        Apakah Anda yakin ingin menghapus pengguna
                        <span class="font-semibold text-gray-900">{{ selectedUser.name }}</span
                        >?
                        <br />
                        <span class="text-sm text-red-600">Tindakan ini tidak dapat dibatalkan.</span>
                    </p>
                    <div class="flex justify-center gap-3">
                        <button
                            @click="selectedUser = null"
                            class="rounded-lg border-2 border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition-all duration-150 hover:border-gray-400 hover:bg-gray-50"
                        >
                            Batal
                        </button>
                        <button
                            @click="deleteUser"
                            class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-150 hover:bg-red-700 focus:ring-2 focus:ring-red-500/50 focus:outline-none"
                        >
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

// Types
interface User {
    id: number;
    name: string;
    email: string;
    role: string;
}

// Props
const props = defineProps<{
    users: User[];
}>();

// Reactive data
const selectedUser = ref<User | null>(null);
const searchQuery = ref('');

// Computed properties
const filteredUsers = computed(() => {
    if (!searchQuery.value) return props.users;

    return props.users.filter(
        (user: User) =>
            user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            user.email.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            user.role.toLowerCase().includes(searchQuery.value.toLowerCase()),
    );
});

// Methods
function confirmDelete(user: User) {
    selectedUser.value = user;
}

function deleteUser() {
    if (!selectedUser.value) return;

    router.delete(route('users.destroy', selectedUser.value.id), {
        onSuccess: () => {
            selectedUser.value = null;
            router.visit(route('users.index'), {
                preserveScroll: true,
                replace: true,
            });
        },
    });
}

function getUsersByRole(role: string) {
    return props.users.filter((user: User) => user.role === role);
}

function getRoleBadgeClass(role: string) {
    const classes = {
        admin: 'bg-purple-100 text-purple-700',
        kader: 'bg-green-100 text-green-700',
        user: 'bg-orange-100 text-orange-700',
    };
    return classes[role as keyof typeof classes] || 'bg-gray-100 text-gray-700';
}

function getRoleIcon(role: string) {
    const icons = {
        admin: '👑',
        kader: '🎯',
        user: '👤',
    };
    return icons[role as keyof typeof icons] || '👤';
}
</script>
