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
                    <!-- <Link
                        :href="route('registrations.create',medis.id)"
                        class="rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:from-blue-600 hover:to-indigo-700"
                    >
                        Tambah Peserta
                    </Link> -->
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
                                    <div class="flex gap-4">
                                        <Link
                                            :href="route('rekam-medis.create', medis.id)"
                                            class="rounded-2xl bg-gray-100 p-2 text-sm text-blue-600 hover:underline"
                                            >Edit</Link
                                        >
                                        <button
                                            @click="confirmDelete(medis)"
                                            class="rounded-2xl bg-gray-100 p-2 text-sm text-green-600 hover:underline"
                                        >
                                            rekam
                                        </button>
                                        <button
                                            @click="confirmDelete(medis)"
                                            class="rounded-2xl bg-gray-100 p-2 text-sm text-red-600 hover:underline"
                                        >
                                            Hapus
                                        </button>
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
</template>

<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface Medis {
    id: number;
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

const props = defineProps<{ medis: Medis[] }>();
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
