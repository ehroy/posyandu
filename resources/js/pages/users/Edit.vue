<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import Useredit from '@/pages/layout/Useredit.vue';
import type { BreadcrumbItemType } from '@/types';

interface User {
    id: number;
    name: string;
    email: string;
    role: string;
}

interface Props {
    user: User;
    breadcrumbs?: BreadcrumbItemType[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const user = props.user; // Ambil satu user (edit yang pertama misalnya)
console.log(user);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Useredit :user="user" />
    </AppLayout>
</template>
