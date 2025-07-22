<template>
    <div class="p-6">
        <!-- Header Section -->
        <div class="mb-6 flex flex-col items-start justify-between md:flex-row md:items-center">
            <div>
                <h1 class="mb-2 text-2xl font-bold text-gray-900">Kelola Kegiatan</h1>
                <p class="text-gray-600">Daftar dan kelola semua kegiatan yang tersedia</p>
            </div>
            <button
                @click="openPopup"
                class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-200 hover:from-blue-600 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500/50 focus:outline-none"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Daftar Kegiatan Baru
            </button>
        </div>

        <!-- Filter Section -->
        <div class="mb-6 rounded-lg bg-white p-4 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row">
                <div class="flex-1">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Cari Kegiatan</label>
                    <input
                        v-model="searchQuery"
                        type="text"
                        placeholder="Cari berdasarkan nama atau lokasi..."
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                </div>
                <div class="md:w-48">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Jenis Kegiatan</label>
                    <select
                        v-model="selectedJenis"
                        class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                        <option value="">Semua Jenis</option>
                        <option v-for="jenis in jenisKegiatanOptions" :key="jenis" :value="jenis">
                            {{ jenis }}
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Kegiatan List -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div
                v-for="item in filteredKegiatan"
                :key="item.id"
                class="cursor-pointer rounded-lg border border-gray-200 bg-white p-4 shadow-sm transition-shadow duration-200 hover:shadow-md"
                @click="showDetailKegiatan(item)"
            >
                <div class="mb-3 flex items-start justify-between">
                    <h3 class="line-clamp-2 text-lg font-semibold text-gray-900">
                        {{ item.nama_kegiatan }}
                    </h3>
                    <span v-if="item.jenis_kegiatan" class="rounded-full bg-blue-100 px-2 py-1 text-xs text-blue-800">
                        {{ item.jenis_kegiatan }}
                    </span>
                </div>

                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>
                        <span>{{ formatDate(item.tanggal_mulai) }}</span>
                    </div>

                    <div v-if="item.lokasi" class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                            />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ item.lokasi }}</span>
                    </div>

                    <p v-if="item.deskripsi" class="line-clamp-2 text-gray-500">
                        {{ item.deskripsi }}
                    </p>
                    <div class="flex justify-end">
                        <button
                            @click="confirmDelete(item)"
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
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div v-if="filteredKegiatan.length === 0" class="py-12 text-center">
            <svg class="mx-auto mb-4 h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                />
            </svg>
            <h3 class="mb-2 text-lg font-medium text-gray-900">Tidak ada kegiatan</h3>
            <p class="text-gray-500">Tidak ada kegiatan yang sesuai dengan filter Anda.</p>
        </div>
        <div class="flex items-center justify-between border-t bg-gray-50 px-6 py-4 text-sm text-gray-700">
            <span> Menampilkan halaman {{ page.current_page }} dari {{ page.last_page }} halaman </span>
            <div class="flex gap-1">
                <template v-for="link in page.links" :key="link.label">
                    <Link
                        v-if="link.url"
                        :href="link.url"
                        v-html="link.label"
                        class="rounded border px-3 py-1 text-sm"
                        :class="{
                            'bg-blue-500 text-white': link.active,
                            'hover:bg-blue-100': !link.active,
                        }"
                    />
                    <span v-else v-html="link.label" class="cursor-not-allowed rounded border px-3 py-1 text-sm text-gray-400" />
                </template>
            </div>
        </div>
    </div>

    <!-- Popup Form Register Kegiatan -->
    <div v-if="isPopupOpen" class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center p-4 backdrop-blur-xs" @click.self="closePopup">
        <div class="max-h-[90vh] w-full max-w-md overflow-y-auto rounded-lg bg-white">
            <div class="p-6">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Daftar Kegiatan Baru</h2>
                    <button @click="closePopup" class="text-gray-400 transition-colors hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form @submit.prevent="submitForm" class="space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700"> Nama Kegiatan <span class="text-red-500">*</span> </label>
                        <input
                            v-model="form.nama_kegiatan"
                            type="text"
                            required
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan nama kegiatan"
                        />
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Jenis Kegiatan</label>
                        <select
                            v-model="form.jenis_kegiatan"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >
                            <option value="">Pilih jenis kegiatan</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Pelatihan">Pelatihan</option>
                            <option value="Webinar">Webinar</option>
                            <option value="Konferensi">Konferensi</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700"> Tanggal Mulai <span class="text-red-500">*</span> </label>
                        <input
                            v-model="form.tanggal_mulai"
                            type="date"
                            required
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        />
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                        <input
                            v-model="form.tanggal_selesai"
                            type="date"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        />
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Lokasi</label>
                        <input
                            v-model="form.lokasi"
                            type="text"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan lokasi kegiatan"
                        />
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea
                            v-model="form.deskripsi"
                            rows="3"
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Masukkan deskripsi kegiatan"
                        ></textarea>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button
                            type="button"
                            @click="closePopup"
                            class="flex-1 rounded-md border border-gray-300 px-4 py-2 text-gray-700 transition-colors hover:bg-gray-50"
                            :disabled="isLoading"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            class="flex-1 rounded-md bg-blue-600 px-4 py-2 text-white transition-colors hover:bg-blue-700 disabled:opacity-50"
                            :disabled="isLoading"
                        >
                            {{ isLoading ? 'Menyimpan...' : 'Daftar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detail Kegiatan Modal -->
    <div
        v-if="showDetail && selectedKegiatan"
        class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center p-4 backdrop-blur-xs"
        @click.self="closeDetail"
    >
        <div class="max-h-[90vh] w-full max-w-lg overflow-y-auto rounded-lg bg-white">
            <div class="p-6">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Detail Kegiatan</h2>
                    <button @click="closeDetail" class="text-gray-400 transition-colors hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-4">
                    <div>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">{{ selectedKegiatan.nama_kegiatan }}</h3>
                        <span v-if="selectedKegiatan.jenis_kegiatan" class="inline-block rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800">
                            {{ selectedKegiatan.jenis_kegiatan }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                            <p class="text-gray-900">{{ formatDate(selectedKegiatan.tanggal_mulai) }}</p>
                        </div>

                        <div v-if="selectedKegiatan.tanggal_selesai">
                            <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                            <p class="text-gray-900">{{ formatDate(selectedKegiatan.tanggal_selesai) }}</p>
                        </div>

                        <div v-if="selectedKegiatan.lokasi">
                            <label class="mb-1 block text-sm font-medium text-gray-700">Lokasi</label>
                            <p class="text-gray-900">{{ selectedKegiatan.lokasi }}</p>
                        </div>

                        <div v-if="selectedKegiatan.deskripsi">
                            <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi</label>
                            <p class="text-gray-900">{{ selectedKegiatan.deskripsi }}</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button
                            @click="closeDetail"
                            class="w-full rounded-md bg-gray-100 px-4 py-2 text-gray-700 transition-colors hover:bg-gray-200"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <span class="font-semibold text-gray-900">{{ selectedUser.nama_kegiatan }}</span
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
</template>
<script setup lang="ts">
import { Link, router, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
// Interface untuk Kegiatan
interface Kegiatan {
    id: number;
    nama_kegiatan: string;
    jenis_kegiatan?: string | null;
    tanggal_mulai: string;
    tanggal_selesai?: string | null;
    lokasi?: string | null;
    deskripsi?: string | null;
    created_at?: string;
    updated_at?: string;
}

interface Props {
    kegiatan: Kegiatan[];
}

const props = defineProps<{
    kegiatan: Kegiatan[];
    page: any;
}>();
// State management
const isPopupOpen = ref(false);
const isLoading = ref(false);
const searchQuery = ref('');
const selectedJenis = ref('');
const showDetail = ref(false);
const selectedKegiatan = ref<Kegiatan | null>(null);
const selectedUser = ref<Kegiatan | null>(null);
function confirmDelete(item: Kegiatan) {
    selectedUser.value = item;
}

function deleteUser() {
    if (!selectedUser.value) return;
    console.log(selectedUser.value.id);

    router.delete(route('kegiatan.destroy', selectedUser.value.id), {
        onSuccess: () => {
            selectedUser.value = null;
            router.visit(route('kegiatan.index'), {
                preserveScroll: true,
                replace: true,
            });
        },
    });
}

// Computed properties
const filteredKegiatan = computed(() => {
    let data = props.page.data;

    if (!data || !Array.isArray(data)) return [];

    return data.filter((item) => {
        const matchesSearch =
            !searchQuery.value ||
            item.nama_kegiatan.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            (item.lokasi && item.lokasi.toLowerCase().includes(searchQuery.value.toLowerCase()));

        const matchesJenis = !selectedJenis.value || item.jenis_kegiatan === selectedJenis.value;

        return matchesSearch && matchesJenis;
    });
});

const jenisKegiatanOptions: any = computed(() => {
    const jenis = [...new Set(props.kegiatan.map((k) => k.jenis_kegiatan).filter(Boolean))];
    return jenis;
});

// Methods
const openPopup = () => {
    isPopupOpen.value = true;
};

const closePopup = () => {
    isPopupOpen.value = false;
};
const form = useForm({
    nama_kegiatan: '',
    jenis_kegiatan: '',
    tanggal_mulai: '',
    tanggal_selesai: '',
    lokasi: '',
    deskripsi: '',
});

const submitForm = async () => {
    try {
        isLoading.value = true;
        console.log(form);
        form.post(route('kegiatan.store'));
    } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mendaftarkan kegiatan!');
    } finally {
        isLoading.value = false;
    }
};

const showDetailKegiatan = (kegiatan: Kegiatan) => {
    selectedKegiatan.value = kegiatan;
    showDetail.value = true;
};

const closeDetail = () => {
    showDetail.value = false;
    selectedKegiatan.value = null;
};

const formatDate = (dateString: string) => {
    if (!dateString) return '-';
    return new Date(dateString).toLocaleDateString('id-ID', {
        day: '2-digit',
        month: 'long',
        year: 'numeric',
    });
};

const formatDateInput = (dateString: string) => {
    if (!dateString) return '';
    return new Date(dateString).toISOString().split('T')[0];
};
</script>
