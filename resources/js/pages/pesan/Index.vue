<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';
import Pesandashboard from '../layout/Pesandashboard.vue';

// ✅ Gabungkan semua props dalam satu interface
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

interface Props {
    medis: Medis[];
    breadcrumbs?: BreadcrumbItemType[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const medis = props.medis;
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Pesandashboard></Pesandashboard>
    </AppLayout>
</template>
