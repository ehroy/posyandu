<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import Medisindex from '@/pages/layout/Medisindex.vue';
import type { BreadcrumbItemType } from '@/types';

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
    page: any;
    medis: any;
    breadcrumbs?: BreadcrumbItemType[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
console.log(props);
const medis = props.medis;
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs"> <Medisindex :medis="medis" :page="props.page" /></AppLayout>
</template>
