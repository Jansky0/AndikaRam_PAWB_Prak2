@extends('layouts.app')

@section('title', 'Konfirmasi Laporan Banjir')

@section('content')
    <h2>Konfirmasi Laporan Banjir</h2>

    {{-- Komponen Alert --}}
    <x-alert type="success" message="Data laporan banjir berhasil dikirim." />

    <div class="card">
        <p><strong>Nama Pelapor:</strong> {{ $nama }}</p>
        <p><strong>Lokasi Kejadian:</strong> {{ $lokasi }}</p>
        <p><strong>Tinggi Genangan Air:</strong> {{ $tinggi_genangan }} cm</p>

        @if(is_numeric($tinggi_genangan))
            @if($tinggi_genangan < 30)
                <p><strong>Status:</strong> <span style="color: orange; font-weight: bold;">Waspada</span></p>
            @elseif($tinggi_genangan <= 70)
                <p><strong>Status:</strong> <span style="color: darkorange; font-weight: bold;">Siaga</span></p>
            @else
                <p><strong>Status:</strong> <span style="color: red; font-weight: bold;">Awas</span></p>
            @endif
        @endif
    </div>

    <br>
    <a href="{{ route('laporan.form') }}">Buat Laporan Baru</a>
@endsection
