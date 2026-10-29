<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KategoriGuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JurusanController::class, 'index'])->name('home');

// Routing CRUD Jurusan
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'prosesSimpan'])->name('jurusan.store');
Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/{id}', [JurusanController::class, 'prosesEdit'])->name('jurusan.update');
Route::delete('/jurusan/{id}', [JurusanController::class, 'prosesHapus'])->name('jurusan.destroy');

// Routing CRUD Siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'prosesEdit'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'prosesHapus'])->name('siswa.destroy');

// Routing CRUD Guru
Route::resource('guru', GuruController::class)->except(['show']);

// Routing CRUD Kategori Guru
Route::resource('kategori-guru', KategoriGuruController::class)->names([
    'index' => 'kategori_guru.index',
    'create' => 'kategori_guru.create',
    'store' => 'kategori_guru.store',
    'edit' => 'kategori_guru.edit',
    'update' => 'kategori_guru.update',
    'destroy' => 'kategori_guru.destroy',
])->except(['show']);