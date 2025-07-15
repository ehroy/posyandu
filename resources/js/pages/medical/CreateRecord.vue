<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="mx-auto max-w-4xl">
            <!-- Header Card -->
            <div class="mb-6 rounded-2xl bg-gradient-to-r from-purple-600 to-blue-600 p-6 text-white shadow-lg">
                <div class="flex items-center space-x-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Tambah Rekam Medis</h2>
                        <p class="text-purple-100">untuk {{ registration.nama_lengkap }}</p>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="rounded-2xl bg-white p-8 shadow-xl">
                <form @submit.prevent="submitForm" class="space-y-8">
                    <!-- Informasi Kunjungan Section -->
                    <div class="rounded-xl bg-gray-50 p-6">
                        <h3 class="mb-4 flex items-center text-lg font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 6v6m4-6v6m-8-2h16"
                                />
                            </svg>
                            Informasi Kunjungan
                        </h3>

                        <div>
                            <label class="mb-3 block text-sm font-medium text-gray-700">
                                <span class="flex items-center">
                                    <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 6v6m4-6v6m-8-2h16"
                                        />
                                    </svg>
                                    Tanggal Kunjungan
                                </span>
                            </label>
                            <input
                                type="date"
                                v-model="form.tanggal_kunjungan"
                                required
                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-100 focus:outline-none"
                            />
                        </div>
                    </div>

                    <!-- Pengukuran Fisik Section -->
                    <div class="rounded-xl bg-blue-50 p-6">
                        <h3 class="mb-4 flex items-center text-lg font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                />
                            </svg>
                            Pengukuran Fisik
                        </h3>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="group">
                                <label class="mb-3 block text-sm font-medium text-gray-700">
                                    <span class="flex items-center">
                                        <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"
                                            />
                                        </svg>
                                        Berat Badan
                                    </span>
                                </label>
                                <div class="relative">
                                    <input
                                        type="number"
                                        step="0.1"
                                        v-model="form.berat_badan"
                                        placeholder="0.0"
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 pr-12 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 focus:outline-none"
                                    />
                                    <span class="absolute top-3 right-3 text-sm text-gray-500">kg</span>
                                </div>
                            </div>

                            <div class="group">
                                <label class="mb-3 block text-sm font-medium text-gray-700">
                                    <span class="flex items-center">
                                        <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 21l3-3-3-3m8 6l-3-3 3-3M5 7h14M5 17h14"
                                            />
                                        </svg>
                                        Tinggi Badan
                                    </span>
                                </label>
                                <div class="relative">
                                    <input
                                        type="number"
                                        step="0.1"
                                        v-model="form.tinggi_badan"
                                        placeholder="0.0"
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 pr-12 transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 focus:outline-none"
                                    />
                                    <span class="absolute top-3 right-3 text-sm text-gray-500">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Imunisasi dan Vitamin Section -->
                    <div class="rounded-xl bg-green-50 p-6">
                        <h3 class="mb-4 flex items-center text-lg font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                            Imunisasi & Vitamin
                        </h3>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="group">
                                <label class="mb-3 block text-sm font-medium text-gray-700">
                                    <span class="flex items-center">
                                        <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"
                                            />
                                        </svg>
                                        Jenis Imunisasi
                                    </span>
                                </label>
                                <input
                                    type="text"
                                    v-model="form.imunisasi"
                                    placeholder="Contoh: BCG, DPT, Polio"
                                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 transition-all duration-200 focus:border-green-500 focus:ring-2 focus:ring-green-100 focus:outline-none"
                                />
                            </div>

                            <div class="group">
                                <label class="mb-3 block text-sm font-medium text-gray-700">
                                    <span class="flex items-center">
                                        <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 002 2h2a2 2 0 012-2V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4M7 21a4 4 0 004-4V9a2 2 0 00-2-2H7a2 2 0 00-2 2v8a4 4 0 004 4z"
                                            />
                                        </svg>
                                        Jenis Vitamin
                                    </span>
                                </label>
                                <input
                                    type="text"
                                    v-model="form.vitamin"
                                    placeholder="Contoh: Vitamin A, D3, C"
                                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 transition-all duration-200 focus:border-green-500 focus:ring-2 focus:ring-green-100 focus:outline-none"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Kesehatan Section -->
                    <div class="rounded-xl bg-yellow-50 p-6">
                        <h3 class="mb-4 flex items-center text-lg font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                />
                            </svg>
                            Catatan Kesehatan
                        </h3>

                        <div>
                            <label class="mb-3 block text-sm font-medium text-gray-700"> Kondisi kesehatan dan observasi tambahan </label>
                            <textarea
                                v-model="form.catatan_kesehatan"
                                rows="5"
                                placeholder="Tulis kondisi kesehatan, keluhan, atau observasi khusus lainnya..."
                                class="w-full resize-none rounded-xl border-2 border-gray-200 px-4 py-3 transition-all duration-200 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-100 focus:outline-none"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-6">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="group relative flex items-center space-x-2 rounded-full bg-gradient-to-r from-purple-600 to-blue-600 px-8 py-4 font-semibold text-white shadow-lg transition-all duration-200 hover:scale-105 hover:from-purple-700 hover:to-blue-700 hover:shadow-xl disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            <svg class="h-5 w-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ form.processing ? 'Menyimpan...' : 'Simpan Rekam Medis' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import { useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';
const props = defineProps<{
    registration: {
        id: number;
        nama_lengkap: string;
    };
    breadcrumbs?: BreadcrumbItemType[];
}>();
console.log(props);
const form = useForm({
    registration_id: props.registration.id,
    tanggal_kunjungan: '',
    berat_badan: '',
    tinggi_badan: '',
    imunisasi: '',
    vitamin: '',
    catatan_kesehatan: '',
});

function submitForm() {
    form.post(route('rekam-medis.store'), {
        preserveScroll: true,
    });
}
</script>
