<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PangkatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('templates/header');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/golongan', [GolonganController::class, 'Index'])->name('golongan.index');
    Route::post('/golongan/store', [GolonganController::class, 'Store'])->name('golongan.store');
    Route::patch('/golongan/update', [GolonganController::class, 'Update'])->name('golongan.update');
    Route::delete('golongan/{id}/delete', [GolonganController::class, 'Destroy'])->name('golongan.destroy');

    Route::get('/jabatan', [JabatanController::class, 'Index'])->name('jabatan.index');
    Route::post('/jabatan/store', [JabatanController::class, 'Store'])->name('jabatan.store');
    Route::patch('/jabatan/update', [JabatanController::class, 'Update'])->name('jabatan.update');
    Route::delete('jabatan/{id}/delete', [JabatanController::class, 'Destroy'])->name('jabatan.destroy');

    Route::get('/pangkat', [PangkatController::class, 'Index'])->name('pangkat.index');
    Route::post('/pangkat/store', [PangkatController::class, 'Store'])->name('pangkat.store');
    Route::patch('/pangkat/update', [PangkatController::class, 'Update'])->name('pangkat.update');
    Route::delete('pangkat/{id}/delete', [PangkatController::class, 'Destroy'])->name('pangkat.destroy');

    Route::get('/pegawai', [ProfileController::class, 'Index'])->name('pegawai.index');
    Route::post('/pegawai/store', [ProfileController::class, 'Store'])->name('pegawai.store');
    Route::patch('/pegawai/update', [ProfileController::class, 'Update'])->name('pegawai.update');
    Route::delete('pegawai/{id}/delete', [ProfileController::class, 'Destroy'])->name('pegawai.destroy');
});

require __DIR__.'/auth.php';
