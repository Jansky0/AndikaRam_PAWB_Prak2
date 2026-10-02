<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return redirect()->route('laporan.index');
});

// Materi Praktikum Modul 3
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Tugas Praktikum Modul 3 (LaporBanjir - sama seperti Prak1 dengan tambahan daftar laporan)
Route::get('/laporan', [DataController::class, 'index'])->name('laporan.index');
Route::get('/formbanjir', [DataController::class, 'formbanjir'])->name('laporan.form');
Route::post('/prosesbanjir', [DataController::class, 'prosesbanjir'])->name('laporan.store');
Route::get('/konfirmasi', [DataController::class, 'konfirmasi'])->name('laporan.confirmation');
