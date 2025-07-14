import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}
export interface Peserta {
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
export interface Kegiatan {
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
export interface Medis {
    id: number;
    registration_id: number;
    tanggal_kunjungan: string; // atau Date kalau mau pakai Date
    berat_badan: number;
    tinggi_badan: number;
    imunisasi: string;
    vitamin: string;
    catatan_kesehatan: string;
    created_at: string;
    updated_at: string;
    registration: any;
}
export type BreadcrumbItemType = BreadcrumbItem;
