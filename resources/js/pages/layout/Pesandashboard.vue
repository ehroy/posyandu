<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-4 sm:p-6 lg:p-8">
        <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Users</p>
                        <p class="text-2xl font-bold text-gray-900">1</p>
                    </div>
                    <div class="rounded-lg bg-blue-100 p-3">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Users</p>
                        <p class="text-2xl font-bold text-gray-900">1</p>
                    </div>
                    <div class="rounded-lg bg-blue-100 p-3">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Users</p>
                        <p class="text-2xl font-bold text-gray-900">1</p>
                    </div>
                    <div class="rounded-lg bg-blue-100 p-3">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="rounded-xl bg-white p-6 shadow-lg ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Admin</p>
                        <p class="text-2xl font-bold text-gray-900">1</p>
                    </div>
                    <div class="rounded-lg bg-purple-100 p-3">
                        <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                            ></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-screen rounded-xl bg-gradient-to-br from-green-50 to-blue-50 p-4">
            <h2 class="mb-6 text-xl font-semibold text-gray-900">Buat Pesan</h2>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Form Pesan -->
                <div class="space-y-6">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Pilih Penerima</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" value="selected" v-model="recipientType" class="text-whatsapp focus:ring-whatsapp" />
                                <span class="ml-2 text-sm text-gray-700">Kontak Terpilih ({{ selectedContacts.length }})</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" value="group" v-model="recipientType" class="text-whatsapp focus:ring-whatsapp" />
                                <span class="ml-2 text-sm text-gray-700">Berdasarkan Grup</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" value="all" v-model="recipientType" class="text-whatsapp focus:ring-whatsapp" />
                                <span class="ml-2 text-sm text-gray-700">Semua Kontak</span>
                            </label>
                        </div>
                    </div>

                    <div v-if="recipientType === 'group'">
                        <label class="mb-2 block text-sm font-medium text-gray-700">Pilih Grup</label>
                        <select
                            v-model="selectedGroup"
                            class="focus:ring-whatsapp w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-transparent focus:ring-2"
                        >
                            <option value="">Pilih Grup</option>
                            <option v-for="group in groups" :key="group" :value="group">{{ group }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea
                            v-model="message"
                            rows="8"
                            placeholder="Tulis pesan Anda di sini..."
                            class="focus:ring-whatsapp w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-transparent focus:ring-2"
                        ></textarea>
                        <p class="mt-1 text-sm text-gray-500">{{ message.length }} karakter</p>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Delay Pengiriman (detik)</label>
                        <input
                            v-model.number="sendDelay"
                            type="number"
                            min="1"
                            max="60"
                            class="focus:ring-whatsapp w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-transparent focus:ring-2"
                        />
                        <p class="mt-1 text-sm text-gray-500">Jeda waktu antar pengiriman pesan</p>
                    </div>

                    <div class="flex space-x-4">
                        <button
                            @click="sendMessage"
                            :disabled="!message || sendingStatus === 'sending'"
                            class="bg-whatsapp hover:bg-whatsapp-dark flex flex-1 items-center justify-center space-x-2 rounded-lg px-6 py-3 text-white transition-colors duration-200 disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            <svg v-if="sendingStatus === 'sending'" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            <svg v-else class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span>{{ sendingStatus === 'sending' ? 'Mengirim...' : 'Kirim Pesan' }}</span>
                        </button>
                        <button
                            v-if="sendingStatus === 'sending'"
                            @click="pauseSending"
                            class="rounded-lg bg-yellow-500 px-6 py-3 text-white transition-colors duration-200 hover:bg-yellow-600"
                        >
                            Pause
                        </button>
                    </div>
                </div>

                <!-- Preview -->
                <div class="rounded-lg bg-gray-50 p-6">
                    <h3 class="mb-4 text-lg font-medium text-gray-900">Preview Pesan</h3>
                    <div class="rounded-lg border border-gray-200 bg-white p-4">
                        <div class="mb-3 flex items-center">
                            <div class="bg-whatsapp flex h-8 w-8 items-center justify-center rounded-full">
                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"
                                    />
                                </svg>
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-900">WhatsApp Business</span>
                        </div>
                        <div class="rounded-lg bg-green-100 p-3 text-sm text-gray-800">
                            {{ message || 'Pesan akan muncul di sini...' }}
                        </div>
                    </div>

                    <div class="mt-4 rounded-lg bg-blue-50 p-4">
                        <h4 class="mb-2 font-medium text-blue-900">Informasi Pengiriman</h4>
                        <div class="space-y-1 text-sm text-blue-800">
                            <p>Jumlah Penerima: {{ getRecipientCount() }}</p>
                            <p>Estimasi Waktu: {{ Math.ceil((getRecipientCount() * sendDelay) / 60) }} menit</p>
                            <p>Delay: {{ sendDelay }} detik</p>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div v-if="sendingStatus === 'sending'" class="mt-4">
                        <div class="mb-2 flex justify-between text-sm text-gray-600">
                            <span>Progress Pengiriman</span>
                            <span>{{ sendProgress }}%</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-gray-200">
                            <div class="bg-whatsapp h-2 rounded-full transition-all duration-300" :style="{ width: sendProgress + '%' }"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed, onBeforeUnmount, ref, watch } from 'vue';

type Contact = {
    id: number;
    nama: string;
    no_hp: string;
    group: string;
};

// ✅ Dummy Data Kontak - nanti ganti dari API
const contacts = ref<Contact[]>([
    { id: 1, nama: 'Ani', no_hp: '081234567890', group: 'Ibu Balita' },
    { id: 2, nama: 'Budi', no_hp: '082345678901', group: 'Ibu Balita' },
    { id: 3, nama: 'Citra', no_hp: '083456789012', group: 'Lansia' },
]);

// 🟢 State
const recipientType = ref<'selected' | 'group' | 'all'>('selected');
const selectedContacts = ref<Contact[]>([]);
const selectedGroup = ref<string>('');
const groups = computed(() => [...new Set(contacts.value.map((c) => c.group))]);
const message = ref('');
const sendDelay = ref(2);
const sendingStatus = ref<'idle' | 'sending' | 'paused'>('idle');
const sendProgress = ref(0);

// 📤 Fungsi Kirim Pesan
let sendInterval = 3000;
const sendMessage = async () => {
    const recipients = getRecipients();

    if (!recipients.length || !message.value) return;

    sendingStatus.value = 'sending';
    sendProgress.value = 0;

    let index = 0;
    sendInterval = setInterval(() => {
        if (sendingStatus.value !== 'sending') return;

        if (index >= recipients.length) {
            clearInterval(sendInterval!);
            sendingStatus.value = 'idle';
            sendProgress.value = 100;
            return;
        }

        const contact = recipients[index];
        const formatted = encodeURIComponent(`Halo ${contact.nama}, ${message.value}`);
        const phone = contact.no_hp.replace(/^0/, '62');
        const link = `https://wa.me/${phone}?text=${formatted}`;
        window.open(link, '_blank');

        index++;
        sendProgress.value = Math.floor((index / recipients.length) * 100);
    }, sendDelay.value * 1000);
};

// 🔁 Fungsi Pause
const pauseSending = () => {
    sendingStatus.value = 'paused';
    if (sendInterval) clearInterval(sendInterval);
};

// 🧮 Hitung Jumlah Penerima
const getRecipients = (): Contact[] => {
    if (recipientType.value === 'all') return contacts.value;
    if (recipientType.value === 'group') return contacts.value.filter((c) => c.group === selectedGroup.value);
    return selectedContacts.value;
};

const getRecipientCount = (): number => getRecipients().length;

// 🧹 Cleanup interval saat komponen unmount
onBeforeUnmount(() => {
    if (sendInterval) clearInterval(sendInterval);
});

// ❗ Reset progress kalau status kembali ke idle
watch(sendingStatus, (val) => {
    if (val === 'idle') {
        sendProgress.value = 0;
    }
});
</script>
