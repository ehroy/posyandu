<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import Userindex from '@/pages/layout/Userindex.vue';
import type { BreadcrumbItemType } from '@/types';

// ✅ Gabungkan semua props dalam satu interface
interface User {
    id: number;
    name: string;
    email: string;
    role: string;
}

interface Props {
    users: User[];
    breadcrumbs?: BreadcrumbItemType[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const users = props.users;
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs"> <Userindex :users="users" /></AppLayout>
</template>
