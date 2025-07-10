<template>
    <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-blue-50 to-purple-50 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-2xl">
            <!-- Header Section -->
            <div class="mb-8 text-center">
                <div
                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-r from-emerald-500 to-blue-600 shadow-lg"
                >
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                        ></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Tambah Pengguna Baru</h1>
                <p class="mt-2 text-gray-600">Buat akun pengguna baru untuk sistem</p>
            </div>

            <!-- Form Card -->
            <div class="overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-gray-200">
                <div class="bg-gradient-to-r from-emerald-500 to-blue-600 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Informasi Pengguna</h2>
                </div>

                <form @submit.prevent="submit" class="p-6 sm:p-8">
                    <!-- Progress Bar -->
                    <div class="mb-8">
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Progress</span>
                            <span class="text-sm font-medium text-gray-700">{{ Math.round(completionProgress) }}%</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200">
                            <div
                                class="h-2 rounded-full bg-gradient-to-r from-emerald-500 to-blue-600 transition-all duration-300"
                                :style="{ width: completionProgress + '%' }"
                            ></div>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-semibold text-gray-700" for="name">
                            <span class="flex items-center">
                                <svg class="mr-2 h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    ></path>
                                </svg>
                                Nama Lengkap
                                <span class="ml-1 text-red-500">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                class="w-full rounded-lg border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 transition-all duration-200 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none"
                                placeholder="Masukkan nama lengkap"
                                :class="{ 'border-red-300 focus:border-red-500 focus:ring-red-500/20': form.errors.name }"
                            />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg v-if="form.name" class="h-5 w-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <p v-if="form.errors.name" class="mt-2 flex items-center text-sm text-red-600">
                            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            {{ form.errors.name }}
                        </p>
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-semibold text-gray-700" for="email">
                            <span class="flex items-center">
                                <svg class="mr-2 h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                    ></path>
                                </svg>
                                Alamat Email
                                <span class="ml-1 text-red-500">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="w-full rounded-lg border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 transition-all duration-200 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none"
                                placeholder="contoh@email.com"
                                :class="{ 'border-red-300 focus:border-red-500 focus:ring-red-500/20': form.errors.email }"
                            />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg
                                    v-if="form.email && isValidEmail(form.email)"
                                    class="h-5 w-5 text-emerald-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <p v-if="form.errors.email" class="mt-2 flex items-center text-sm text-red-600">
                            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-semibold text-gray-700" for="password">
                            <span class="flex items-center">
                                <svg class="mr-2 h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    ></path>
                                </svg>
                                Kata Sandi
                                <span class="ml-1 text-red-500">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                id="password"
                                class="w-full rounded-lg border-2 border-gray-200 bg-gray-50 px-4 py-3 pr-12 text-gray-900 transition-all duration-200 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none"
                                placeholder="Minimal 8 karakter"
                                :class="{ 'border-red-300 focus:border-red-500 focus:ring-red-500/20': form.errors.password }"
                            />
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"
                            >
                                <svg v-if="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"
                                    ></path>
                                </svg>
                                <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Password Strength Indicator -->
                        <div class="mt-2">
                            <div class="mb-1 flex items-center justify-between">
                                <span class="text-xs text-gray-600">Kekuatan Password</span>
                                <span class="text-xs text-gray-600">{{ getPasswordStrengthText(form.password) }}</span>
                            </div>
                            <div class="h-1 w-full rounded-full bg-gray-200">
                                <div
                                    class="h-1 rounded-full transition-all duration-300"
                                    :class="getPasswordStrengthClass(form.password)"
                                    :style="{ width: getPasswordStrength(form.password) + '%' }"
                                ></div>
                            </div>
                        </div>
                        <p v-if="form.errors.password" class="mt-2 flex items-center text-sm text-red-600">
                            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-semibold text-gray-700" for="password_confirmation">
                            <span class="flex items-center">
                                <svg class="mr-2 h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                                Konfirmasi Kata Sandi
                                <span class="ml-1 text-red-500">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.password_confirmation"
                                :type="showPasswordConfirmation ? 'text' : 'password'"
                                id="password_confirmation"
                                class="w-full rounded-lg border-2 border-gray-200 bg-gray-50 px-4 py-3 pr-12 text-gray-900 transition-all duration-200 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none"
                                placeholder="Ulangi kata sandi"
                                :class="{ 'border-red-300 focus:border-red-500 focus:ring-red-500/20': form.errors.password_confirmation }"
                            />
                            <button
                                type="button"
                                @click="showPasswordConfirmation = !showPasswordConfirmation"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"
                            >
                                <svg v-if="showPasswordConfirmation" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"
                                    ></path>
                                </svg>
                                <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                        <p
                            v-if="form.password && form.password_confirmation && form.password !== form.password_confirmation"
                            class="mt-2 flex items-center text-sm text-red-600"
                        >
                            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            Kata sandi tidak cocok
                        </p>
                        <p v-if="form.errors.password_confirmation" class="mt-2 flex items-center text-sm text-red-600">
                            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            {{ form.errors.password_confirmation }}
                        </p>
                    </div>

                    <!-- Role -->
                    <div class="mb-8">
                        <label class="mb-2 block text-sm font-semibold text-gray-700" for="role">
                            <span class="flex items-center">
                                <svg class="mr-2 h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    ></path>
                                </svg>
                                Peran Pengguna
                                <span class="ml-1 text-red-500">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <select
                                v-model="form.role"
                                id="role"
                                class="w-full appearance-none rounded-lg border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 transition-all duration-200 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none"
                                :class="{ 'border-red-300 focus:border-red-500 focus:ring-red-500/20': form.errors.role }"
                            >
                                <option value="">Pilih peran pengguna</option>
                                <option value="admin" class="bg-white text-gray-900">👑 Admin - Akses penuh sistem</option>
                                <option value="kader" class="bg-white text-gray-900">🎯 Kader - Akses terbatas</option>
                                <option value="user" class="bg-white text-gray-900">👤 User - Akses dasar</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <p v-if="form.errors.role" class="mt-2 flex items-center text-sm text-red-600">
                            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                            </svg>
                            {{ form.errors.role }}
                        </p>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-3">
                        <Link
                            :href="route('users.index')"
                            class="rounded-lg border-2 border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 transition-all duration-200 hover:border-gray-400 hover:bg-gray-50 focus:ring-2 focus:ring-gray-500/20 focus:outline-none"
                        >
                            Batal
                        </Link>
                        <button
                            type="submit"
                            class="group relative overflow-hidden rounded-lg bg-gradient-to-r from-emerald-500 to-blue-600 px-6 py-3 text-sm font-semibold text-white transition-all duration-200 hover:from-emerald-600 hover:to-blue-700 focus:ring-2 focus:ring-emerald-500/50 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            :disabled="form.processing || !isFormValid"
                        >
                            <span class="relative z-10 flex items-center">
                                <svg v-if="form.processing" class="mr-2 h-4 w-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    ></path>
                                </svg>
                                <svg v-else class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                {{ form.processing ? 'Membuat Akun...' : 'Buat Pengguna' }}
                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-blue-700 opacity-0 transition-opacity duration-200 group-hover:opacity-100"
                            ></div>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Security Info -->
            <div class="mt-8 rounded-lg bg-blue-50 p-4 ring-1 ring-blue-200">
                <div class="flex items-start">
                    <svg class="mt-0.5 mr-3 h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                    </svg>
                    <div>
                        <h3 class="text-sm font-medium text-blue-900">Informasi Keamanan</h3>
                        <p class="mt-1 text-sm text-blue-700">
                            Pastikan untuk menggunakan kata sandi yang kuat dan email yang valid. Pengguna akan menerima email konfirmasi untuk
                            mengaktifkan akun.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
// Reactive data
const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

// Form setup
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: '',
});
const isFormValid = computed(() => {
    return (
        form.name &&
        form.email &&
        form.password &&
        form.password_confirmation &&
        form.role &&
        form.password === form.password_confirmation &&
        isValidEmail(form.email)
    );
});

const completionProgress = computed(() => {
    let progress = 0;
    const fields = ['name', 'email', 'password', 'password_confirmation', 'role'];

    fields.forEach((field) => {
        if (form[field as keyof typeof form.data]) {
            progress += 20;
        }
    });

    return progress;
});

// Methods
function submit() {
    form.post(route('users.store'));
}

function isValidEmail(email: string): boolean {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function getPasswordStrength(password: string): number {
    if (!password) return 0;

    let strength = 0;

    // Length check
    if (password.length >= 8) strength += 25;
    if (password.length >= 12) strength += 15;

    // Character variety
    if (/[a-z]/.test(password)) strength += 15;
    if (/[A-Z]/.test(password)) strength += 15;
    if (/[0-9]/.test(password)) strength += 15;
    if (/[^A-Za-z0-9]/.test(password)) strength += 15;

    return Math.min(strength, 100);
}

function getPasswordStrengthClass(password: string): string {
    const strength = getPasswordStrength(password);

    if (strength < 30) return 'bg-red-500';
    if (strength < 60) return 'bg-yellow-500';
    if (strength < 80) return 'bg-blue-500';
    return 'bg-green-500';
}

function getPasswordStrengthText(password: string): string {
    const strength = getPasswordStrength(password);

    if (strength < 30) return 'Lemah';
    if (strength < 60) return 'Sedang';
    if (strength < 80) return 'Kuat';
    return 'Sangat Kuat';
}
// const submit = () => {
//     form.post(route('register'), {
//         onFinish: () => form.reset('password', 'password_confirmation'),
//     });
// };
</script>
