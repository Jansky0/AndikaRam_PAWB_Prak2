@extends('layouts.app')

@section('title', 'Form LaporBanjir')

@section('content')
    <h2>Halaman Form Pelaporan Banjir (LaporBanjir)</h2>

    <form action="{{ route('laporan.store') }}" method="POST">
        @csrf
        <label>Nama Pelapor :</label><br>
        <input type="text" name="nama_pelapor" required><br><br>

        <label>Lokasi Kejadian :</label><br>
        <input type="text" name="lokasi" required><br><br>

        <label>Tinggi Genangan Air :</label><br>
        <input type="text" name="tinggi_air" required><br><br>

        <input type="submit" value="Kirim">
    </form>
@endsection
