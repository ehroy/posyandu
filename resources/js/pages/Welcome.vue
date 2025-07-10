<script setup lang="ts">
import Feature from '@/pages/layout/Feature.vue';
import Footer from '@/pages/layout/Footer.vue';
import Formregister from '@/pages/layout/Formregister.vue';
import Hero from '@/pages/layout/Hero.vue';
import Navbar from '@/pages/layout/Navbar.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50">
        <Navbar />
        <Hero />
        <Feature />
        <Formregister />
        <Footer />
    </div>
</template>
