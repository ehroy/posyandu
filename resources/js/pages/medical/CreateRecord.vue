<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="mx-auto max-w-3xl rounded-xl bg-white p-6 shadow-md">
            <h2 class="mb-6 text-2xl font-semibold text-gray-800">Tambah Rekam Medis untuk {{ registration.nama_lengkap }}</h2>

            <form @submit.prevent="submitForm" class="space-y-6">
                <!-- Tanggal Kunjungan -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Tanggal Kunjungan</label>
                    <input
                        type="date"
                        v-model="form.tanggal_kunjungan"
                        required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                    />
                </div>

                <!-- Berat dan Tinggi Badan -->
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Berat Badan (kg)</label>
                        <input
                            type="number"
                            step="0.1"
                            v-model="form.berat_badan"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Tinggi Badan (cm)</label>
                        <input
                            type="number"
                            step="0.1"
                            v-model="form.tinggi_badan"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        />
                    </div>
                </div>

                <!-- Imunisasi dan Vitamin -->
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Jenis Imunisasi</label>
                        <input
                            type="text"
                            v-model="form.imunisasi"
                            placeholder="Contoh: BCG, DPT, Polio"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Jenis Vitamin</label>
                        <input
                            type="text"
                            v-model="form.vitamin"
                            placeholder="Contoh: Vitamin A"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        />
                    </div>
                </div>

                <!-- Catatan Kesehatan -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Catatan Kesehatan</label>
                    <textarea
                        v-model="form.catatan_kesehatan"
                        rows="4"
                        placeholder="Tulis kondisi kesehatan tambahan..."
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 text-right">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-full bg-purple-600 px-6 py-3 font-semibold text-white shadow transition hover:bg-purple-700"
                    >
                        Simpan Rekam Medis
                    </button>
                </div>
            </form>
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
