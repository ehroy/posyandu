<template>
    <div class="max-w-screen space-y-12 p-4 sm:px-6 lg:px-8">
        <!-- Ringkasan -->
        <section>
            <h2 class="mb-6 text-xl font-semibold text-gray-800 sm:text-2xl">Ringkasan Dashboard</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div class="rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-500 p-6 text-white shadow-md">
                    <h3 class="text-base font-medium">Jumlah Peserta</h3>
                    <p class="mt-2 text-3xl font-bold">123</p>
                </div>
                <div class="rounded-2xl bg-gradient-to-r from-green-500 to-teal-500 p-6 text-white shadow-md">
                    <h3 class="text-base font-medium">Pemeriksaan Bulan Ini</h3>
                    <p class="mt-2 text-3xl font-bold">45</p>
                </div>
                <div class="rounded-2xl bg-gradient-to-r from-yellow-500 to-orange-500 p-6 text-white shadow-md">
                    <h3 class="text-base font-medium">Jadwal Posyandu</h3>
                    <p class="mt-2 text-3xl font-bold">3 Kegiatan</p>
                </div>
            </div>
        </section>

        <!-- Statistik Kategori Peserta -->
        <section>
            <h2 class="mb-6 text-xl font-semibold text-gray-800 sm:text-2xl">Statistik Kategori Peserta</h2>
            <div class="overflow-x-auto border-2 p-10">
                <div class="h-64 min-w-[320px] rounded-xl bg-white p-4 sm:h-80 sm:p-6">
                    <BarChart :chart-id="'kategori-bar'" :chart-data="kategoriChartData" :options="barOptions" />
                </div>
            </div>
        </section>

        <!-- Pemeriksaan Per Bulan -->
        <section>
            <h2 class="mb-6 text-xl font-semibold text-gray-800 sm:text-2xl">Pemeriksaan Per Bulan</h2>
            <div class="overflow-x-auto border-2 p-10">
                <div class="h-64 min-w-[320px] rounded-xl bg-white p-4 sm:h-80 sm:p-6">
                    <LineChart :chart-id="'pemeriksaan-line'" :chart-data="pemeriksaanChartData" :options="lineOptions" />
                </div>
            </div>
        </section>

        <!-- Daftar Peserta -->
        <section>
            <h2 class="mb-6 text-xl font-semibold text-gray-800 sm:text-2xl">Daftar Peserta</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full overflow-hidden rounded-lg border text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-xs tracking-wide text-gray-600 uppercase">
                        <tr>
                            <th class="p-4">Nama</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Umur</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(peserta, index) in pesertaDummy" :key="index" class="border-t transition hover:bg-gray-50">
                            <td class="p-4">{{ peserta.nama }}</td>
                            <td class="p-4">{{ peserta.kategori }}</td>
                            <td class="p-4">{{ peserta.umur }} tahun</td>
                            <td class="p-4">
                                <button class="text-blue-600 hover:underline">Lihat</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Pemeriksaan Terbaru -->
        <section>
            <div class="mb-10">
                <h2 class="mb-6 text-xl font-semibold text-gray-800 sm:text-2xl">Pemeriksaan Terbaru</h2>
                <ul class="space-y-4">
                    <li v-for="(item, index) in pemeriksaanDummy" :key="index" class="rounded-xl border p-4 shadow-sm transition hover:shadow">
                        <p class="text-sm text-gray-800">
                            <strong>{{ item.nama }}</strong> diperiksa pada
                            <span class="text-gray-600">{{ item.tanggal }}</span>
                        </p>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</template>

<script setup lang="ts">
import {
    BarController,
    BarElement,
    CategoryScale,
    Chart as ChartJS,
    ChartOptions,
    Legend,
    LinearScale,
    LineController,
    LineElement,
    PointElement,
    Title,
    Tooltip,
} from 'chart.js';

import { ref } from 'vue';
import { BarChart, LineChart } from 'vue-chart-3';

ChartJS.register(Title, Tooltip, Legend, BarController, BarElement, CategoryScale, LinearScale, LineController, LineElement, PointElement);

const pesertaDummy = ref([
    { nama: 'Ayu Lestari', kategori: 'Balita', umur: 4 },
    { nama: 'Dewi Ningsih', kategori: 'Ibu Hamil', umur: 28 },
    { nama: 'Pak Budi', kategori: 'Lansia', umur: 65 },
]);

const pemeriksaanDummy = ref([
    { nama: 'Ayu Lestari', tanggal: '2025-07-09' },
    { nama: 'Dewi Ningsih', tanggal: '2025-07-08' },
]);

const kategoriChartData = ref({
    labels: ['Balita', 'Ibu Hamil', 'Lansia', 'Remaja', 'Dewasa'],
    datasets: [
        {
            label: 'Jumlah Peserta',
            data: [25, 15, 10, 5, 3],
            backgroundColor: '#7c3aed',
        },
    ],
});

const pemeriksaanChartData = ref({
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
    datasets: [
        {
            label: 'Jumlah Pemeriksaan',
            data: [5, 8, 6, 9, 10, 7, 11],
            fill: false,
            borderColor: '#10b981',
            tension: 0.4,
        },
    ],
});

const barOptions: ChartOptions<'bar'> = {
    responsive: true,
    plugins: {
        legend: { position: 'top' },
        title: { display: true, text: 'Distribusi Kategori Peserta' },
    },
};

const lineOptions: ChartOptions<'line'> = {
    responsive: true,
    plugins: {
        legend: { position: 'top' },
        title: { display: true, text: 'Jumlah Pemeriksaan per Bulan' },
    },
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                stepSize: 1,
            },
        },
    },
};
</script>

<style scoped></style>
