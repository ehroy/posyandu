<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\MedicalRecord;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class KegiatanController extends Controller
{
     public function dashboard()
    {
        $datapeserta = Registration::all();
        $kegiatan = Kegiatan::all();
        $rekam = MedicalRecord::with('registration')->get();
        $kategoriCounts = $datapeserta
            ->groupBy('kategori_peserta')
            ->map->count();

        $labelsKategori = $kategoriCounts->keys()->toArray();
        $dataKategori   = $kategoriCounts->values()->toArray();

        // 2. Siapkan data untuk chart pemeriksaan (7 bulan terakhir)
        $bulanAwal = Carbon::now()->subMonths(6)->startOfMonth();
        // groupBy bulan (angka 1–12) dari tanggal_kunjungan
        $rekamPerBulan = $rekam
            ->groupBy(function($rec) {
                return Carbon::parse($rec->tanggal_kunjungan)->month;
            })
            ->map->count();

        $labelsPemeriksaan = [];
        $dataPemeriksaan   = [];
        for ($i = 0; $i < 7; $i++) {
            $m = $bulanAwal->copy()->addMonths($i);
            $bl = $m->month;
            $labelsPemeriksaan[] = $m->translatedFormat('M'); // Jan, Feb, dst (locale id)
            $dataPemeriksaan[]   = $rekamPerBulan->get($bl, 0);
        }
        $now        = Carbon::now();
        $countThisMonth = \App\Models\MedicalRecord::whereYear('tanggal_kunjungan', $now->year)
            ->whereMonth('tanggal_kunjungan', $now->month)
            ->count();
         return Inertia::render('Dashboard',[
            'peserta' => $datapeserta,
            'kegiatan' => $kegiatan,
            'medis' => $rekam,
            'kategoriChart' => [
                'labels'   => $labelsKategori,
                'datasets' => [[
                    'label'           => 'Jumlah Peserta',
                    'data'            => $dataKategori,
                    'backgroundColor' => '#7c3aed',
                ]],
            ],
            'pemeriksaanChart' => [
                'labels'   => $labelsPemeriksaan,
                'datasets' => [[
                    'label'       => 'Jumlah Pemeriksaan',
                    'data'        => $dataPemeriksaan,
                    'fill'        => false,
                    'borderColor' => '#10b981',
                    'tension'     => 0.4,
                ]],
            ],
            'countThisMonth' => $countThisMonth
         ]);
    }
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return Inertia::render('kegiatan/Index',[
            'kegiatan' =>  $kegiatan,
        ]);
    }

    public function pesan()
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

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'nullable|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'dibuat_oleh' => Auth::id(),
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dibuat');
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'nullable|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
