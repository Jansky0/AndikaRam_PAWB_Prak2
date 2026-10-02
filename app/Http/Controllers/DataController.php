<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    // Daftar laporan banjir (data array di Controller sesuai Modul 3)
    private $daftar_laporan = [
        [
            'nama_pelapor' => 'Wahyudi',
            'lokasi' => 'Dayeuhkolot',
            'tinggi_air' => 25,
        ],
        [
            'nama_pelapor' => 'Siti',
            'lokasi' => 'Baleendah',
            'tinggi_air' => 50,
        ],
        [
            'nama_pelapor' => 'Asep',
            'lokasi' => 'Bojongsoang',
            'tinggi_air' => 80,
        ],
    ];

    public function index()
    {
        $laporan = $this->daftar_laporan;
        return view('laporan.index', compact('laporan'));
    }

    public function formbanjir()
    {
        return view('laporan.formbanjir');
    }

    public function prosesbanjir(Request $request)
    {
        $nama = $request->input('nama_pelapor') ?? $request->input('nama');
        $lokasi = $request->input('lokasi');
        $tinggi_air = $request->input('tinggi_air') ?? $request->input('tinggi_genangan');

        $payload = [
            'nama_pelapor' => $nama,
            'lokasi' => $lokasi,
            'tinggi_air' => $tinggi_air,
        ];

        return redirect()->route('laporan.confirmation')->with('laporan_banjir', $payload);
    }

    public function konfirmasi()
    {
        $laporan = session('laporan_banjir', []);
        $nama = $laporan['nama_pelapor'] ?? $laporan['nama'] ?? 'Wahyudi';
        $lokasi = $laporan['lokasi'] ?? 'Dayeuhkolot';
        $tinggi_genangan = $laporan['tinggi_air'] ?? $laporan['tinggi_genangan'] ?? 45;

        return view('laporan.konfirmasi', compact('nama', 'lokasi', 'tinggi_genangan'));
    }
}
