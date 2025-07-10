<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <!-- Header -->
            <div class="mb-8 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Kelola Peserta</h1>
                    <p class="mt-2 text-gray-600">Daftar peserta yang telah mendaftar ke Posyandu</p>
                </div>
                <div class="flex items-center gap-4">
                    <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Cari peserta..."
                        class="rounded-lg border-2 border-gray-200 bg-white py-2 pr-4 pl-10 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none"
                    />
                    <button
                        @click="show()"
                        class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:from-blue-600 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500/50 focus:outline-none"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Pendaftaran
                    </button>
                </div>
            </div>
            <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Pendaftaran</p>
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
            </div>

            <!-- Tabel -->
            <div class="overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-gray-200">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Peserta</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase">
                            <tr>
                                <th class="px-6 py-4">Nama</th>
                                <th class="px-6 py-4">NIK</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Aksi</th>
                                <th class="px-6 py-4">Hasil Catatan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr v-for="medis in filteredUsers" :key="medis.id" class="hover:bg-blue-50/50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ medis.nama_lengkap }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ medis.nik }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block rounded-full px-3 py-1 text-xs font-semibold"
                                        :class="getKategoriBadgeClass(medis.kategori_peserta)"
                                    >
                                        {{ medis.kategori_peserta }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <Link
                                            :href="route('rekam-medis.create', medis.id)"
                                            class="group/btn flex items-center gap-1 rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-medium text-green-700 transition-all duration-150 hover:bg-blue-200 hover:text-green-800"
                                            >Rekam</Link
                                        >
                                        <Link
                                            :href="route('rekam-medis.create', medis.id)"
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
                                            Edit</Link
                                        >
                                        <button
                                            @click="confirmDelete(medis)"
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
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="group/btn flex items-center gap-1 rounded-lg bg-blue-100 px-3 py-1.5 text-xs font-medium text-blue-700 transition-all duration-150 hover:bg-blue-200 hover:text-blue-800"
                                        >
                                            <button class="text-green-600 hover:underline" @click="openModal(medis.medical_records)">
                                                {{ medis.medical_records.length }} data
                                            </button>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z"
                                                />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Konfirmasi Hapus -->
            <div v-if="selectedUser" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                <div class="mx-4 w-full max-w-md transform rounded-2xl bg-white p-6 shadow-2xl ring-1 ring-gray-200">
                    <div class="text-center">
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">Hapus Peserta?</h3>
                        <p class="mb-6 text-gray-600">
                            Yakin ingin menghapus <strong>{{ selectedUser.nama_lengkap }}</strong
                            >?
                        </p>
                        <div class="flex justify-center gap-3">
                            <button @click="selectedUser = null" class="rounded-lg border px-4 py-2 text-sm text-gray-700">Batal</button>
                            <button @click="deleteUser" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div v-if="showModal && selectedMedis" class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-none">
        <div class="w-[80%] rounded-lg bg-white p-6 px-10 py-5 shadow-xl">
            <h2 class="mb-4 text-lg font-bold">Catatan Medis untuk: {{ selectedMedis.name }}</h2>

            <ul v-if="selectedMedis.length > 0" class="max-h-64 space-y-2 overflow-y-auto text-sm">
                <li v-for="record in selectedMedis" :key="record.id" class="border-b bg-gray-50 p-2 pb-2">
                    <div class="gap-4 space-y-2 text-sm">
                        <div><strong>ID Registrasi:</strong> {{ record.registration_id }}</div>
                        <div><strong>Tanggal Kunjungan:</strong> {{ record.tanggal_kunjungan }}</div>
                        <div><strong>Berat Badan:</strong> {{ record.berat_badan }} kg</div>
                        <div><strong>Tinggi Badan:</strong> {{ record.tinggi_badan }} cm</div>
                        <div><strong>Imunisasi:</strong> {{ record.imunisasi }}</div>
                        <div><strong>Vitamin:</strong> {{ record.vitamin }}</div>
                        <div><strong>Catatan Kesehatan:</strong> {{ record.catatan_kesehatan }}</div>
                        <div class="text-xs text-gray-500">
                            Dibuat: {{ record.created_at }}<br />
                            Diperbarui: {{ record.updated_at }}
                        </div>
                    </div>
                </li>
            </ul>
            <p v-else class="text-sm text-gray-500">Tidak ada catatan medis.</p>

            <div class="mt-6 text-right">
                <button class="rounded bg-gray-200 px-4 py-2 hover:bg-gray-300" @click="closeModal">Tutup</button>
            </div>
        </div>
    </div>
    <div v-if="showregister" class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-none">
        <div class="max-h-[90vh] w-full max-w-5xl overflow-y-auto rounded-2xl bg-white p-8 shadow-xl">
            <div class="relative">
                <!-- Tombol close di pojok kanan atas -->
                <button
                    @click="close"
                    class="hover:bg-red-706000 absolute top-4 right-4 flex h-12 w-12 items-center justify-center rounded-full text-7xl text-red-500 hover:animate-in hover:zoom-in-95"
                >
                    &times;
                </button>

                <!-- Isi form -->
                <Formregister />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Formregister from '@/pages/layout/Formregister.vue';
import { Link, router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface MedicalRecord {
    id: number;
    description: string;
    registration_id: number;
    [key: string]: any;
}

interface MedicalRecord {
    id: number;
    registration_id: number;
    tanggal_kunjungan: string; // Format: YYYY-MM-DD
    berat_badan: number; // Dalam kg
    tinggi_badan: number; // Dalam cm
    imunisasi: string;
    vitamin: string;
    catatan_kesehatan: string;
    created_at: string; // Format: YYYY-MM-DD HH:mm:ss
    updated_at: string;
}
const showregister = ref(false);
const showModal = ref(false);
const selectedMedis = ref<MedicalRecord | null>(null);
function show() {
    showregister.value = true;
}

// Fungsi untuk membuka modal
function openModal(record: MedicalRecord) {
    selectedMedis.value = record;
    showModal.value = true;
}

// Fungsi untuk menutup modal
function closeModal() {
    showModal.value = false;
    selectedMedis.value = null;
}
interface Medis {
    id: number;
    medical_records: [];
    nama_lengkap: string;
    nik: string;
    tanggal_lahir: string;
    jenis_kelamin: string;
    no_telepon: string;
    kategori_peserta: string;
    alamat: string;
    rt_rw: string;
    kelurahan: string;
    kecamatan: string;
    kota: string;
    nama_kontak_darurat: string;
    no_telepon_darurat: string;
    hubungan_kontak: string;
}

const props = defineProps<{ medis: Medis[]; record: []; showregister: boolean }>();

function close() {
    showregister.value = false;
}
console.log(props);
const searchQuery = ref('');
const selectedUser = ref<Medis | null>(null);

const filteredUsers = computed(() => {
    if (!searchQuery.value) return props.medis;
    return props.medis.filter(
        (u) =>
            u.nama_lengkap.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            u.nik.includes(searchQuery.value) ||
            u.kategori_peserta.toLowerCase().includes(searchQuery.value.toLowerCase()),
    );
});

function getKategoriBadgeClass(kategori: string) {
    const colors: Record<string, string> = {
        balita: 'bg-yellow-100 text-yellow-800',
        anak: 'bg-blue-100 text-blue-800',
        remaja: 'bg-purple-100 text-purple-800',
        dewasa: 'bg-green-100 text-green-800',
        lansia: 'bg-red-100 text-red-800',
        'ibu-hamil': 'bg-pink-100 text-pink-800',
        'ibu-menyusui': 'bg-indigo-100 text-indigo-800',
    };
    return colors[kategori] || 'bg-gray-100 text-gray-800';
}

function confirmDelete(user: Medis) {
    selectedUser.value = user;
}
function getUser() {
    return props.medis;
}

function deleteUser() {
    if (!selectedUser.value) return;
    router.delete(route('registrations.destroy', selectedUser.value.id), {
        onSuccess: () => {
            selectedUser.value = null;
            router.visit(route('registrations.index'), {
                preserveScroll: true,
                replace: true,
            });
        },
    });
}
</script>
