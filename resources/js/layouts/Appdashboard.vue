<template>
    <div class="space-y-8 p-6">
        <!-- Ringkasan -->
        <section>
            <h2 class="mb-4 text-2xl font-bold">Ringkasan Dashboard</h2>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="rounded-xl bg-gradient-to-r from-purple-500 to-indigo-500 p-6 text-white">
                    <h3 class="text-lg">Jumlah Peserta</h3>
                    <p class="text-3xl font-bold">123</p>
                </div>
                <div class="rounded-xl bg-gradient-to-r from-green-500 to-teal-500 p-6 text-white">
                    <h3 class="text-lg">Pemeriksaan Bulan Ini</h3>
                    <p class="text-3xl font-bold">45</p>
                </div>
                <div class="rounded-xl bg-gradient-to-r from-yellow-500 to-orange-500 p-6 text-white">
                    <h3 class="text-lg">Jadwal Posyandu</h3>
                    <p class="text-3xl font-bold">3 Kegiatan</p>
                </div>
            </div>
        </section>

        <!-- Grafik Pertumbuhan Peserta -->
        <section>
            <h2 class="mb-4 text-2xl font-bold">Statistik Kategori Peserta</h2>
            <div class="rounded-lg bg-white p-4 shadow">
                <BarChart :chart-id="'kategori-bar'" :chart-data="kategoriChartData" :options="barOptions" />
            </div>
        </section>

        <!-- Grafik Pemeriksaan Bulanan -->
        <section>
            <h2 class="mb-4 text-2xl font-bold">Pemeriksaan Per Bulan</h2>
            <div class="rounded-lg bg-white p-4 shadow">
                <LineChart :chart-id="'pemeriksaan-line'" :chart-data="pemeriksaanChartData" :options="lineOptions" />
            </div>
        </section>

        <!-- Daftar Peserta -->
        <section>
            <h2 class="mb-4 text-2xl font-bold">Daftar Peserta</h2>
            <table class="w-full overflow-hidden rounded-lg border text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Kategori</th>
                        <th class="p-3">Umur</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(peserta, index) in pesertaDummy" :key="index" class="border-t">
                        <td class="p-3">{{ peserta.nama }}</td>
                        <td class="p-3">{{ peserta.kategori }}</td>
                        <td class="p-3">{{ peserta.umur }} tahun</td>
                        <td class="p-3">
                            <button class="text-blue-600 hover:underline">Lihat</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Pemeriksaan Terbaru -->
        <section>
            <h2 class="mb-4 text-2xl font-bold">Pemeriksaan Terbaru</h2>
            <ul class="space-y-4">
                <li v-for="(item, index) in pemeriksaanDummy" :key="index" class="rounded-lg border p-4">
                    <strong>{{ item.nama }}</strong> diperiksa pada <span class="text-gray-600">{{ item.tanggal }}</span>
                </li>
            </ul>
        </section>
    </div>
</template>

<script setup lang="ts">
import { BarElement, CategoryScale, Chart as ChartJS, ChartOptions, Legend, LinearScale, LineElement, PointElement, Title, Tooltip } from 'chart.js';
import { ref } from 'vue';
import { BarChart, LineChart } from 'vue-chart-3';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, PointElement, LineElement);

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
