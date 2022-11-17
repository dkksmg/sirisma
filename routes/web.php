<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CS\ApplicationCsController;
use App\Http\Controllers\CS\DashboardController;
use App\Http\Controllers\CS\NewApplicationCsController;
use App\Http\Controllers\CS\ProccesedApplicationCsController;
use App\Http\Controllers\CS\ProcessedApplicationCsController;
use App\Http\Controllers\CS\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kabid\DashboardController as KabidDashboardController;
use App\Http\Controllers\Kabid\NewApplicationKabidController;
use App\Http\Controllers\Kabid\ProccesedApplicationKabidController;
use App\Http\Controllers\Kabid\ProcessedApplicationKabidController;
use App\Http\Controllers\Kabid\ProfileKabidController;
use App\Http\Controllers\Kasi\DashboardController as KasiDashboardController;
use App\Http\Controllers\Kasi\NewApplicationKasiController;
use App\Http\Controllers\Kasi\ProcessedApplicationKasiController;
use App\Http\Controllers\Kasi\ProfileKasiController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\NewApplicationPetugasController;
use App\Http\Controllers\Petugas\ProcessedApplicationPetugasController;
use App\Http\Controllers\Petugas\ProfilePetugasController;
use App\Http\Controllers\User\ApplicantController;
use App\Http\Controllers\User\ApplicationController;

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

Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha'])->name('reloadCaptcha');
Route::prefix('data')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::post('getkotakab', [
            ApplicantController::class,
            'getkotakab',
        ])->name('getkotakab');
        Route::post('getkecamatan', [
            ApplicantController::class,
            'getkecamatan',
        ])->name('getkecamatan');
        Route::post('getkeldesa', [
            ApplicantController::class,
            'getkeldesa',
        ])->name('getkeldesa');
        Route::post('getdataedit', [
            ApplicantController::class,
            'getdataedit',
        ])->name('getdataedit');
    });

// CS
Route::prefix('cs')
    ->middleware(['auth', 'cs', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard-cs');
        Route::resource('penelitian-baru-cs', NewApplicationCsController::class);
        Route::resource('penelitian-terproses-cs', ProcessedApplicationCsController::class);
        Route::resource('profile-cs', ProfileController::class);
    });
// Kabid
Route::prefix('kabid')
    ->middleware(['auth', 'kabid', 'verified'])
    ->group(function () {
        Route::get('/', [KabidDashboardController::class, 'index'])
            ->name('dashboard-kabid');
        Route::resource('penelitian-baru-kabid', NewApplicationKabidController::class);
        Route::resource('penelitian-terproses-kabid', ProcessedApplicationKabidController::class);
        Route::resource('profile-kabid', ProfileKabidController::class);
        Route::get('profile-pemohon-kabid/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('profile-pemohon-kabid');
    });
// Kasi
Route::prefix('kasi')
    ->middleware(['auth', 'kasi', 'verified'])
    ->group(function () {
        Route::get('/', [KasiDashboardController::class, 'index'])
            ->name('dashboard-kasi');
        Route::resource('penelitian-baru-kasi', NewApplicationKasiController::class);
        Route::resource('penelitian-terproses-kasi', ProcessedApplicationKasiController::class);
        Route::get('profile-pemohon-kasi/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('profile-pemohon-kasi');
        Route::resource('profile-kasi', ProfileKasiController::class);
    });
// petugas
Route::prefix('petugas')
    ->middleware(['auth', 'petugas', 'verified'])
    ->group(function () {
        Route::get('/', [PetugasDashboardController::class, 'index'])
            ->name('dashboard-petugas');
        Route::resource('penelitian-baru-petugas', NewApplicationPetugasController::class);
        Route::resource('penelitian-terproses-petugas', ProcessedApplicationPetugasController::class);
        Route::resource('profile-petugas', ProfilePetugasController::class);
        Route::get('profile-pemohon-petugas/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('profile-pemohon-petugas');
        Route::get('generate-penelitian/{id}', [NewApplicationPetugasController::class, 'generate_penelitian'])->name('generate-penelitian');
        Route::put('simpan-surat/{id}', [NewApplicationPetugasController::class, 'simpan_surat_penelitian'])->name('simpan-surat');
    });
// admin
Route::prefix('admin')
    ->middleware(['auth', 'admin', 'verified'])
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard-admin');
        Route::resource('profile-admin', ProfileAdminController::class);
        Route::resource('users', UserController::class);
        Route::get('restore-user/{id}', [UserController::class, 'restore'])->name('restore-user');
        Route::put('verif-email/{id}', [UserController::class, 'verifemail'])->name('verif-email');
        Route::get('pengguna', [UserController::class, 'pengguna'])->name('pengguna');
    });

Route::resource('permohonan', ApplicationController::class)->middleware(['auth', 'verified']);
// Route::get('/permohonan/edit/{id}',  \App\Http\Livewire\Permohonan\Edit::class)->middleware(['auth', 'verified'])->name('permohonan-user.edit');
Route::post('revisi', [ApplicationController::class, 'revisi'])->middleware(['auth', 'verified'])->name('revisi');
Route::resource('profile', ApplicantController::class)->middleware(['auth', 'verified']);
Route::put('ganti-profil/{id}', [ApplicantController::class, 'imageprofile',])->name('imageprofile');
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('simpan-pesan', [HomeController::class, 'store'])->name('simpan-pesan');