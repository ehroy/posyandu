<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Registration;
use Inertia\Inertia;

abstract class Controller
{
    public function index()
    {
    
        $datapeserta = Registration::all();
        $kegiatan = Kegiatan::all();
        dd([
            $datapeserta,
            $kegiatan
        ]);
         return Inertia::render('pesan/Index',[
            'peserta' => $datapeserta,
            'kegiatan' => $kegiatan
         ]);
    }
    
}
