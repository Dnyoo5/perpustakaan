<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('home')->group(function () {
        Route::get('/', [LandingController::class, 'index'])->name('home');
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori');
        Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/datatables', [KategoriController::class, 'datatables'])->name('kategori.datatables');
    });

    Route::prefix('buku')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('buku');
        Route::post('/', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/create', [BukuController::class, 'create'])->name('buku.create');
        Route::get('/show/{id}', [BukuController::class, 'show'])->name('buku.show');
        Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    });


    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
        Route::get('/melihat', [PeminjamanController::class, 'melihat'])->name('peminjaman.riwayat.index');
        Route::get('/datatables', [PeminjamanController::class, 'datatables'])->name('peminjaman.datatables');
        Route::get('/create/{id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::post('/', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
        Route::put('/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
        Route::get('/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
        Route::post('/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
        Route::post('/{id}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');
        Route::post('/check-stok', [PeminjamanController::class, 'checkStok'])->name('peminjaman.checkStok');

    });

});
