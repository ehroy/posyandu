<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return Registration::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|size:16',
            'kk' => 'nullable',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'kategori_peserta' => 'required',
            'alamat' => 'required',
            'rt_rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'golongan_darah' => 'nullable',
            'alergi' => 'nullable',
            'berat_badan' => 'nullable',
            'tinggi_badan' => 'nullable',
            'nama_kontak_darurat' => 'required',
            'no_telepon_darurat' => 'required',
            'hubungan_kontak' => 'required',
            'persetujuan' => 'required|boolean',
        ]);

        $registration = Registration::create($data);
        return response()->json($registration);
    }

    public function update(Request $request, Registration $registration)
    {
         if (!Auth::user()?->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $registration->update($request->all());
        return response()->json(['message' => 'Updated']);
    }

    public function destroy(Registration $registration)
    {
         if (!Auth::user()?->isAdmin()) {
        return response()->json(['message' => 'Unauthorized'], 403);
        }

        $registration->delete();
        return response()->json(['message' => 'Deleted']);
    }
}

