<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Registration;
use App\Models\Kegiatan;
use App\Models\MedicalRecord;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua seeder khusus
        $this->call([
            UserSeeder::class,
            RegistrationSeeder::class,
            KegiatanSeeder::class,
            MedicalRecordSeeder::class,
        ]);
    }
}

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin dan karyawan
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
            'role'     => 'admin', // asumsikan kolom `role` ada di tabel users
        ]);

        User::create([
            'name'     => 'Karyawan User',
            'email'    => 'karyawan@example.com',
            'password' => Hash::make('password'),
            'role'     => 'karyawan',
        ]);
    }
}

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Registration::create([
                'nama_lengkap'          => $faker->name,
                'nik'                   => $faker->unique()->numerify('################'),
                'kk'                    => $faker->numerify('################'),
                'tanggal_lahir'         => $faker->date('Y-m-d', '-18 years'),
                'jenis_kelamin'         => $faker->randomElement(['L', 'P']),
                'no_telepon'            => $faker->phoneNumber,
                'kategori_peserta'      => $faker->randomElement(['Umum', 'Pelajar', 'Lansia']),
                'alamat'                => $faker->address,
                'rt_rw'                 => $faker->numerify('0#/0#'),
                'kelurahan'             => $faker->word,
                'kecamatan'             => $faker->word,
                'kota'                  => $faker->city,
                'golongan_darah'        => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'alergi'                => $faker->optional()->word,
                'berat_badan'           => $faker->optional()->randomFloat(2, 40, 90),
                'tinggi_badan'          => $faker->optional()->randomFloat(2, 140, 200),
                'nama_kontak_darurat'   => $faker->name,
                'no_telepon_darurat'    => $faker->phoneNumber,
                'hubungan_kontak'       => $faker->randomElement(['Orang Tua', 'Saudara', 'Teman']),
                'persetujuan'           => true,
            ]);
        }
    }
}

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $jenis = ['Imunisasi', 'Penyuluhan', 'Workshop', 'Kelas Edukasi'];
        $userIds = User::pluck('id')->all();

        for ($i = 0; $i < 20; $i++) {
            $start = $faker->dateTimeBetween('-1 month', '+1 month');
            $end   = (clone $start)->modify('+'.mt_rand(1,5).' hours');

            Kegiatan::create([
                'nama_kegiatan'    => $faker->sentence(3),
                'jenis_kegiatan'   => $faker->randomElement($jenis),
                'deskripsi'        => $faker->paragraph,
                'tanggal_mulai'    => $start,
                'tanggal_selesai'  => $end,
                'lokasi'           => $faker->city,
                'dibuat_oleh'      => $faker->randomElement($userIds),
            ]);
        }
    }
}

class MedicalRecordSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $regs   = Registration::pluck('id')->all();
        $imunis = ['BCG', 'DPT', 'Polio', 'Campak'];
        $vits   = ['A', 'C', 'D'];

        for ($i = 0; $i < 100; $i++) {
            MedicalRecord::create([
                'registration_id'  => $faker->randomElement($regs),
                'tanggal_kunjungan'=> $faker->date('Y-m-d', 'now'),
                'berat_badan'      => $faker->randomFloat(2, 3, 80),
                'tinggi_badan'     => $faker->randomFloat(2, 30, 200),
                'imunisasi'        => $faker->optional()->randomElement($imunis),
                'vitamin'          => $faker->optional()->randomElement($vits),
                'catatan_kesehatan'=> $faker->optional()->sentence,
            ]);
        }
    }
}
