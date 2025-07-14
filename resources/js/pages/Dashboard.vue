<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import Appdashboard from '@/pages/layout/Appdashboard.vue';
import type { BreadcrumbItemType } from '@/types';
import { type BreadcrumbItem, type Kegiatan, type Medis, type Peserta } from '@/types';

import { Head } from '@inertiajs/vue3';

interface Props {
    peserta: Peserta[];
    kegiatan: Kegiatan[];
    medis: Medis[];
    kategoriChart: any;
    pemeriksaanChart: any;
    countThisMonth: any;
    breadcrumbs?: BreadcrumbItemType[];
}
const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const peserta = props.peserta;
const kegiatan = props.kegiatan;
const medis = props.medis;
const kategoriChart = props.kategoriChart;
const pemeriksaanChart = props.pemeriksaanChart;
const countThisMonth = props.countThisMonth;

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Appdashboard
            :peserta="peserta"
            :kegiatan="kegiatan"
            :medis="medis"
            :kategoriChart="kategoriChart"
            :pemeriksaanChart="pemeriksaanChart"
            :countThisMonth="countThisMonth"
    /></AppLayout>
</template>
