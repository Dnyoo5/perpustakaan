<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuMemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenggunaController;
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

Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login-form', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showregister'])->name('register.form');
Route::post('/register-form', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('dashboard')->group(function () {
        Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/data', [DashboardController::class, 'getData'])->name('dashboard.data');
            Route::get('/category-data', [DashboardController::class, 'getCategoryData'])->name('dashboard.category.data');
            Route::get('/most-read-books', [DashboardController::class, 'getMostReadBooks'])->name('dashboard.most-read-books');
            Route::get('/latest-books', [DashboardController::class, 'getLatestBooks'])->name('dashboard.latest-books');
        });
    });

    Route::prefix('home')->group(function () {
        Route::get('/', [homeController::class, 'index'])->name('home');
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

    Route::prefix('buku-member')->group(function () {
        Route::get('/', [BukuMemberController::class, 'index'])->name('buku-landing');
        Route::get('/show/{id}', [BukuMemberController::class, 'show'])->name('buku-member.show');
    });

    Route::prefix('pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('/datatables', [PenggunaController::class, 'datatables'])->name('pengguna.datatables');
        Route::post('/', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::get('/show/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
        Route::get('/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::put('/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::get('/detail/{id}', [PenggunaController::class, 'show'])->name('pengguna.detail');
        Route::get('/destroy/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
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
        Route::post('/{id}/confirm-return', [PeminjamanController::class, 'confirmReturn'])->name('peminjaman.confirmReturn');
    });

    Route::prefix('peminjaman-member')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
        Route::get('/melihat', [PeminjamanController::class, 'melihat'])->name('peminjaman.riwayat.index');
        Route::get('/datatables-member', [PeminjamanController::class, 'datatablesMember'])->name('peminjaman.member.datatables');
        Route::post('/{id}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');
    });
});
