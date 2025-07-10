<?php

// app/Models/MedicalRecord.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'tanggal_kunjungan',
        'berat_badan',
        'tinggi_badan',
        'imunisasi',
        'vitamin',
        'catatan_kesehatan',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
