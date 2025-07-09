<template>
    <section id="beranda" class="px-6 py-20">
        <div class="container mx-auto text-center">
            <div class="mx-auto max-w-4xl">
                <h2 class="mb-6 text-5xl font-bold text-gray-800">
                    Pendaftaran Posyandu
                    <span class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Digital</span>
                </h2>
                <p class="mb-8 text-xl leading-relaxed text-gray-600">
                    Daftarkan diri Anda dan keluarga ke Posyandu terdekat dengan mudah dan cepat. Sistem modern untuk pelayanan kesehatan yang lebih
                    baik.
                </p>
                <div class="mb-12 flex flex-col justify-center space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <button
                        @click="scrollToForm"
                        class="transform rounded-full bg-gradient-to-r from-purple-600 to-blue-600 px-8 py-4 font-semibold text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >
                        Daftar Sekarang
                    </button>
                    <button
                        class="rounded-full border-2 border-purple-600 px-8 py-4 font-semibold text-purple-600 transition-all duration-300 hover:bg-purple-600 hover:text-white"
                    >
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            <!-- Floating Icons -->
            <div class="relative">
                <div class="float-animation absolute top-0 left-1/4 flex h-16 w-16 items-center justify-center rounded-full bg-purple-100">
                    <svg class="h-8 w-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5z" />
                    </svg>
                </div>
                <div
                    class="float-animation absolute top-20 right-1/4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-100"
                    style="animation-delay: 1s"
                >
                    <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
function scrollToForm() {
    const el = document.getElementById('daftar');
    if (el) {
        el.scrollIntoView({ behavior: 'smooth' });
    }
}
</script>
