<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import Kegiatanindex from '@/pages/layout/Kegiatanindex.vue';
import type { BreadcrumbItemType } from '@/types';

// ✅ Gabungkan semua props dalam satu interface
interface Kegiatan {
    id?: number; // opsional, jika belum disimpan
    nama_kegiatan: string;
    jenis_kegiatan?: string | null;
    tanggal_mulai: string; // format ISO 8601: 'YYYY-MM-DD' atau 'YYYY-MM-DDTHH:mm:ss'
    tanggal_selesai?: string | null;
    lokasi?: string | null;
    deskripsi?: string | null;
    created_at?: string; // opsional untuk metadata dari DB
    updated_at?: string;
}

interface Props {
    kegiatan: Kegiatan[];
    breadcrumbs?: BreadcrumbItemType[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const kegiatan = props.kegiatan;
console.log(kegiatan);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs"> <Kegiatanindex :kegiatan="kegiatan" /></AppLayout>
</template>
