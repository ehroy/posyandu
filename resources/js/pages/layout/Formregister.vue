<template>
    <!-- Registration Form -->
    <section id="daftar" class="bg-gradient-to-br from-gray-50 to-blue-50 px-6 py-20">
        <div class="container mx-auto max-w-4xl">
            <div class="mb-12 text-center">
                <h3 class="mb-4 text-4xl font-bold text-gray-800">Form Pendaftaran</h3>
                <p class="text-lg text-gray-600">Lengkapi data diri Anda dengan benar untuk mendapatkan pelayanan terbaik</p>
            </div>

            <div class="card-shadow rounded-2xl bg-white p-8 md:p-12">
                <form @submit.prevent="submitForm" class="space-y-6">
                    <!-- Data Peserta -->
                    <div class="rounded-xl bg-gradient-to-r from-purple-50 to-blue-50 p-6">
                        <h4 class="mb-4 flex items-center text-xl font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                            </svg>
                            Data Peserta
                        </h4>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                                <input
                                    v-model="form.nama_lengkap"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">NIK *</label>
                                <input
                                    v-model="form.nik"
                                    type="text"
                                    required
                                    maxlength="16"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Tanggal Lahir *</label>
                                <input
                                    v-model="form.tanggal_lahir"
                                    type="date"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Jenis Kelamin *</label>
                                <select
                                    v-model="form.jenis_kelamin"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                >
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">No. Telepon *</label>
                                <input
                                    v-model="form.no_telepon"
                                    type="tel"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Kategori Peserta *</label>
                                <select
                                    v-model="form.kategori_peserta"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                >
                                    <option value="">Pilih Kategori</option>
                                    <option value="balita">Balita (0-5 tahun)</option>
                                    <option value="anak">Anak (6-12 tahun)</option>
                                    <option value="remaja">Remaja (13-18 tahun)</option>
                                    <option value="dewasa">Dewasa (19-59 tahun)</option>
                                    <option value="lansia">Lansia (60+ tahun)</option>
                                    <option value="ibu-hamil">Ibu Hamil</option>
                                    <option value="ibu-menyusui">Ibu Menyusui</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Alamat -->
                    <div class="rounded-xl bg-gradient-to-r from-blue-50 to-green-50 p-6">
                        <h4 class="mb-4 flex items-center text-xl font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5z" />
                            </svg>
                            Alamat Lengkap
                        </h4>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-medium text-gray-700">Alamat Lengkap *</label>
                                <textarea
                                    v-model="form.alamat"
                                    required
                                    rows="3"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                ></textarea>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">RT/RW *</label>
                                <input
                                    v-model="form.rt_rw"
                                    type="text"
                                    required
                                    placeholder="001/002"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Kelurahan/Desa *</label>
                                <input
                                    v-model="form.kelurahan"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Kecamatan *</label>
                                <input
                                    v-model="form.kecamatan"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Kota/Kabupaten *</label>
                                <input
                                    v-model="form.kota"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Data Kesehatan -->
                    <div class="rounded-xl bg-gradient-to-r from-green-50 to-purple-50 p-6">
                        <h4 class="mb-4 flex items-center text-xl font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5z" />
                            </svg>
                            Informasi Kesehatan
                        </h4>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Golongan Darah</label>
                                <select
                                    v-model="form.golongan_darah"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                >
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Alergi/Riwayat Penyakit</label>
                                <input
                                    v-model="form.alergi"
                                    type="text"
                                    placeholder="Kosongkan jika tidak ada"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Berat Badan (kg)</label>
                                <input
                                    v-model="form.berat_badan"
                                    type="number"
                                    step="0.1"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Tinggi Badan (cm)</label>
                                <input
                                    v-model="form.tinggi_badan"
                                    type="number"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Data Kontak Darurat -->
                    <div class="rounded-xl bg-gradient-to-r from-orange-50 to-red-50 p-6">
                        <h4 class="mb-4 flex items-center text-xl font-semibold text-gray-800">
                            <svg class="mr-2 h-5 w-5 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                                />
                            </svg>
                            Kontak Darurat
                        </h4>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Nama Kontak Darurat *</label>
                                <input
                                    v-model="form.nama_kontak_darurat"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">No. Telepon Darurat *</label>
                                <input
                                    v-model="form.no_telepon_darurat"
                                    type="tel"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">Hubungan *</label>
                                <select
                                    v-model="form.hubungan_kontak"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition-all focus:border-transparent focus:ring-2 focus:ring-purple-500"
                                >
                                    <option value="">Pilih Hubungan</option>
                                    <option value="orang-tua">Orang Tua</option>
                                    <option value="pasangan">Pasangan</option>
                                    <option value="anak">Anak</option>
                                    <option value="saudara">Saudara</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Persetujuan -->
                    <div class="rounded-xl bg-gray-50 p-6">
                        <div class="flex items-start space-x-3">
                            <input
                                v-model="form.persetujuan"
                                type="checkbox"
                                required
                                class="mt-1 h-5 w-5 rounded border-gray-300 text-purple-600 focus:ring-purple-500"
                            />
                            <label class="text-sm leading-relaxed text-gray-700">
                                Saya menyetujui bahwa data yang saya berikan adalah benar dan dapat digunakan untuk keperluan pelayanan kesehatan di
                                Posyandu. Saya juga memahami bahwa data pribadi saya akan dijaga kerahasiaannya sesuai dengan peraturan yang berlaku.
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 text-center">
                        <button
                            type="submit"
                            :disabled="isSubmitting"
                            class="transform rounded-full bg-gradient-to-r from-purple-600 to-blue-600 px-12 py-4 text-lg font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            <span v-if="!isSubmitting">Daftar Sekarang</span>
                            <span v-else>Sedang Memproses...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div v-if="showSuccessModal" class="bg-opacity-50 fixed inset-0 z-50 flex items-center justify-center bg-black px-4">
        <div class="mx-4 w-full max-w-md transform rounded-2xl bg-white p-8 transition-all">
            <div class="text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-800">Pendaftaran Berhasil!</h3>
                <p class="mb-6 text-gray-600">Terima kasih telah mendaftar. Data Anda telah tersimpan dengan aman.</p>
                <button @click="closeModal" class="rounded-full bg-gradient-to-r from-purple-600 to-blue-600 px-6 py-3 font-semibold text-white">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const isSubmitting = ref(false);
const showSuccessModal = ref(false);

const form = useForm({
    nama_lengkap: '',
    nik: '',
    kk: '',
    tanggal_lahir: '',
    jenis_kelamin: '',
    no_telepon: '',
    kategori_peserta: '',
    alamat: '',
    rt_rw: '',
    kelurahan: '',
    kecamatan: '',
    kota: '',
    golongan_darah: '',
    alergi: '',
    berat_badan: '',
    tinggi_badan: '',
    nama_kontak_darurat: '',
    no_telepon_darurat: '',
    hubungan_kontak: '',
    persetujuan: false,
});

function submitForm() {
    isSubmitting.value = true;
    form.post(route('registrations.store'), {
        onSuccess: () => {
            showSuccessModal.value = true;
            form.reset();
        },
        onFinish: () => {
            isSubmitting.value = false;
        },
    });
}

function closeModal() {
    showSuccessModal.value = false;
}
</script>
