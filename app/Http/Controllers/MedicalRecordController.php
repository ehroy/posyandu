<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Registration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedicalRecordController extends Controller
{
    /**
     * Tampilkan form rekam medis untuk 1 peserta.
     */

    public function index()
    {
        $registrations = Registration::with('medicalRecords')->get();
        return Inertia::render('medical/Index',[
            'medis' =>  $registrations,
        ]);
    }
    public function create($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);

        return Inertia::render('medical/CreateRecord', [
            'registration' => $registration,
        ]);
        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil disimpan.');
    }

    /**
     * Simpan data rekam medis.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'tanggal_kunjungan' => 'required|date',
            'berat_badan' => 'nullable|numeric|min:0',
            'tinggi_badan' => 'nullable|numeric|min:0',
            'imunisasi' => 'nullable|string|max:255',
            'vitamin' => 'nullable|string|max:255',
            'catatan_kesehatan' => 'nullable|string|max:1000',
        ]);

        MedicalRecord::create($data);

        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil disimpan.');
    }

    /**
     * Tampilkan daftar rekam medis untuk 1 peserta.
     */
    public function show($registrationId)
    {
        $registration = Registration::with('medicalRecords')->findOrFail($registrationId);

        return Inertia::render('medical/ShowRecords', [
            'registration' => $registration,
        ]);
    }
}
