<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenerbitController;

Route::get('/', function () {
    return view('landingPage');
});
Route::get('/admin', function () {
    return view('/admin/dashboard');
});

Route::resource('buku', BukuController::class);
Route::resource('category', CategoryController::class);
Route::resource('penerbit', PenerbitController::class);

Route::get('/admin', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/admin', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::delete('/mahasiswa/{index}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

