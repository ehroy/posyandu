<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'kk',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telepon',
        'kategori_peserta',
        'alamat',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'golongan_darah',
        'alergi',
        'berat_badan',
        'tinggi_badan',
        'nama_kontak_darurat',
        'no_telepon_darurat',
        'hubungan_kontak',
        'persetujuan',
    ];
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
    
}
