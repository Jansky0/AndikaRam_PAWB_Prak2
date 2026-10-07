<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JalanSafeController extends Controller
{
    /**
     * Halaman Utama Tubes Pemrograman Web: JalanSafe
     * Mengimplementasikan Blade View sesuai Modul 3.5 Poin 2
     */
    public function index()
    {
        // Data simulasi laporan kerusakan jalan (berdasarkan proyek Tugas Akhir JalanSafe)
        $laporanJalan = [
            [
                'judul' => 'Jalan Berlubang Parah Dekat Pasar',
                'lokasi' => 'Jl. Raya Bojongsoang No. 128, Kab. Bandung',
                'kategori' => 'Lubang Dalam (>15 cm)',
                'tingkat_kerusakan' => 'berat', // berat, sedang, ringan
                'status' => 'dalam_proses',     // menunggu, dalam_proses, selesai
                'pelapor' => 'Andika Ramadhan',
                'tanggal' => '05 Okt 2026',
                'poin' => 50,
                'koordinat' => '-6.9745, 107.6321'
            ],
            [
                'judul' => 'Aspal Mengelupas dan Amblas',
                'lokasi' => 'Jl. Terusan Buah Batu KM 4',
                'kategori' => 'Amblas Permukaan',
                'tingkat_kerusakan' => 'sedang',
                'status' => 'selesai',
                'pelapor' => 'Sri Haryati',
                'tanggal' => '03 Okt 2026',
                'poin' => 30,
                'koordinat' => '-6.9620, 107.6380'
            ],
            [
                'judul' => 'Retak Memanjang dan Kerikil Lepas',
                'lokasi' => 'Jl. Sukabirus, Desa Citeureup',
                'kategori' => 'Retak Struktur',
                'tingkat_kerusakan' => 'ringan',
                'status' => 'menunggu',
                'pelapor' => 'Nadira Az-Zahra',
                'tanggal' => '01 Okt 2026',
                'poin' => 20,
                'koordinat' => '-6.9790, 107.6295'
            ],
        ];

        return view('jalansafe', compact('laporanJalan'));
    }
}
