@extends('layouts.app')

@section('title', 'JalanSafe - Pelaporan Kerusakan Jalan')

@section('content')
    <div style="margin-bottom: 20px;">
        <h2>JalanSafe - Platform Pelaporan Kerusakan Jalan</h2>
        <p style="color: #555; margin-top: 4px;">
            Implementasi Blade View untuk Tugas Akhir Pemrograman Web Semester 2 (Andika Ramadhan, Sri Haryati, Nadira Az-Zahra).
        </p>
    </div>

    {{-- Komponen Reusable Blade Alert --}}
    <x-alert type="success" message="Modul Tugas Akhir JalanSafe berhasil diintegrasikan ke Blade View Laravel." />

    {{-- Ringkasan Statistik Singkat --}}
    <div class="card" style="background: #fafafa; border-left: 4px solid #007bff;">
        <h3 style="margin-top: 0;">Tentang Sistem JalanSafe</h3>
        <p>
            JalanSafe adalah platform berbasis geotagging untuk mendeteksi dan melaporkan titik jalan rusak secara presisi.
            Data kerusakan jalan diklasifikasikan berdasarkan tingkat urgensi perbaikan dan dilengkapi sistem apresiasi reward poin bagi warga.
        </p>
    </div>

    <h3>Daftar Pengaduan Kerusakan Jalan Terkini</h3>

    {{-- Perulangan Data dengan Directive Blade @forelse --}}
    @forelse($laporanJalan as $jalan)
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap;">
                <div>
                    <h3 style="margin: 0 0 6px 0;">{{ $jalan['judul'] }}</h3>
                    <p style="margin: 2px 0;"><strong>Lokasi:</strong> {{ $jalan['lokasi'] }}</p>
                    <p style="margin: 2px 0; color: #555;"><small>Koordinat Geotagging: {{ $jalan['koordinat'] }}</small></p>
                </div>
                <div style="text-align: right;">
                    <span style="background: #eef; color: #007bff; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 11px;">
                        +{{ $jalan['poin'] }} Poin Reward
                    </span>
                </div>
            </div>

            <hr style="border: none; border-top: 1px solid #eee; margin: 10px 0;">

            <p style="margin: 4px 0;"><strong>Kategori:</strong> {{ $jalan['kategori'] }}</p>

            {{-- Percabangan Blade @if / @elseif / @else untuk Tingkat Kerusakan --}}
            <p style="margin: 4px 0;">
                <strong>Tingkat Urgensi:</strong>
                @if($jalan['tingkat_kerusakan'] === 'berat')
                    <span style="color: red; font-weight: bold;">[BERAT] Butuh Penanganan Cepat</span>
                @elseif($jalan['tingkat_kerusakan'] === 'sedang')
                    <span style="color: darkorange; font-weight: bold;">[SEDANG] Masuk Antrean Perbaikan</span>
                @else
                    <span style="color: green; font-weight: bold;">[RINGAN] Dalam Pemantauan Rutin</span>
                @endif
            </p>

            {{-- Percabangan Status Penanganan --}}
            <p style="margin: 4px 0;">
                <strong>Status Penanganan:</strong>
                @if($jalan['status'] === 'selesai')
                    <span style="color: green;">&#10004; Selesai Diperbaiki Dinas PUPR</span>
                @elseif($jalan['status'] === 'dalam_proses')
                    <span style="color: #007bff;">&#9203; Petugas Sedang di Lapangan</span>
                @else
                    <span style="color: #888;">&#9200; Menunggu Verifikasi Lapangan</span>
                @endif
            </p>

            <p style="margin: 4px 0; color: #666; font-size: 12px;">
                Dilaporkan oleh <strong>{{ $jalan['pelapor'] }}</strong> pada {{ $jalan['tanggal'] }}
            </p>
        </div>
    @empty
        <div class="card">
            <p>Belum ada data laporan kerusakan jalan yang masuk.</p>
        </div>
    @endforelse

    {{-- Form Ringkas Simulasi Pengaduan Jalan Rusak --}}
    <div class="card" style="margin-top: 25px; background: #fdfdfd;">
        <h3>Simulasi Form Lapor Jalan Rusak (JalanSafe)</h3>
        <form action="{{ route('jalansafe.index') }}" method="GET">
            <label>Judul Laporan / Kerusakan :</label><br>
            <input type="text" name="judul" placeholder="Contoh: Aspal amblas dekat halte" style="width: 100%; max-width: 400px; padding: 6px; margin: 4px 0 10px 0;"><br>

            <label>Lokasi Kejadian :</label><br>
            <input type="text" name="lokasi" placeholder="Contoh: Jl. Sukabirus RT 01" style="width: 100%; max-width: 400px; padding: 6px; margin: 4px 0 10px 0;"><br>

            <label>Estimasi Kedalaman / Tingkat Keparahan :</label><br>
            <select name="severity" style="padding: 6px; margin: 4px 0 12px 0;">
                <option value="berat">Berat (Lubang dalam / Jalan putus)</option>
                <option value="sedang">Sedang (Amblas / Bergelombang parah)</option>
                <option value="ringan">Ringan (Retak permukaan)</option>
            </select><br>

            <button type="button" style="padding: 8px 16px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Kirim Aduan JalanSafe
            </button>
        </form>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('laporan.index') }}" style="text-decoration: none; color: #007bff;">&larr; Kembali ke Daftar LaporBanjir</a>
    </div>
@endsection
