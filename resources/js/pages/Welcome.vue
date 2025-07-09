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

    <!-- <header class="gradient-bg shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white">
                        <svg class="h-8 w-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Posyandu Digital</h1>
                        <p class="text-sm text-purple-100">Sistem Pendaftaran Modern</p>
                    </div>
                </div>

                <nav class="hidden space-x-6 md:flex">
                    <a href="#beranda" class="text-white transition-colors hover:text-purple-200">Beranda</a>
                    <a href="#daftar" class="text-white transition-colors hover:text-purple-200">Daftar</a>
                    <a href="#tentang" class="text-white transition-colors hover:text-purple-200">Tentang</a>
                    <a href="#kontak" class="text-white transition-colors hover:text-purple-200">Kontak</a>
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                        >
                            Log in
                        </Link>
                        <Link
                            :href="route('register')"
                            class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </div>
        </div>
    </header> -->
</template>
