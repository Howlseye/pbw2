<?php

use App\Exports\ExportBook;
use App\Imports\ImportBook;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Pest\Plugins\Profile;
use Symfony\Component\Routing\RouterInterface;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/buku/import', function(Request $request) {
    Excel::import(new ImportBook, $request->file('file'));
    return response()->json(['message' => 'Data Berhasil Diimport'], 200);
})->name('buku.import');

Route::get('/buku/export', function() {
    return Excel::download(new ExportBook, 'buku.xlsx');
})->name('buku.export');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('buku', BukuController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('penerbit', PenerbitController::class);
});

Route::get('/', action: function() {
    return view('tampilan-guest');
});

require __DIR__.'/auth.php';
