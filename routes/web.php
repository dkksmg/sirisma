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
use App\Http\Controllers\Petugas\MessagesController;
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
            ->name('cs.dashboard');
        Route::get('penelitian-baru', [NewApplicationCsController::class, 'index'])->name('cs.penelitian-baru');
        Route::post('penelitian-baru', [NewApplicationCsController::class, 'store'])->name('cs.penelitian-baru.store');
        Route::get('penelitian-baru/edit/{id}', [NewApplicationCsController::class, 'edit'])->name('cs.penelitian-baru.edit');
        Route::put('penelitian-baru/update/{id}', [NewApplicationCsController::class, 'update'])->name('cs.penelitian-baru.update');
        Route::get('profile', [ProfileController::class, 'index'])->name('cs.profile');
        Route::put('profile/{id}', [ProfileController::class, 'update'])->name('cs.profile-update');
        Route::get('penelitian-terproses', [ProcessedApplicationCsController::class, 'index'])->name('cs.penelitian-terproses');
    });
// Kabid
Route::prefix('kabid')
    ->middleware(['auth', 'kabid', 'verified'])
    ->group(function () {
        Route::get('/', [KabidDashboardController::class, 'index'])
            ->name('kabid.dashboard');
        Route::get('penelitian-baru', [NewApplicationKabidController::class, 'index'])->name('kabid.penelitian-baru');
        Route::put('penelitian-baru/{id}', [NewApplicationKabidController::class, 'update'])->name('kabid.penelitian-baru-update');
        Route::get('lihat-penelitian/{id}', [NewApplicationKabidController::class, 'show'])->name('kabid.lihat-penelitian');
        Route::get('penelitian-terproses', [ProcessedApplicationKabidController::class, 'index'])->name('kabid.penelitian-terproses');
        Route::get('profile', [ProfileKabidController::class, 'index'])->name('kabid.profile');
        Route::put('profile/{id}', [ProfileKabidController::class, 'update'])->name('kabid.profile-update');
        Route::get('profile-pemohon/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('kabid.profile-pemohon');
    });
// Kasi
Route::prefix('kasi')
    ->middleware(['auth', 'kasi', 'verified'])
    ->group(function () {
        Route::get('/', [KasiDashboardController::class, 'index'])
            ->name('kasi.dashboard');
        Route::get('penelitian-baru', [NewApplicationKasiController::class, 'index'])->name('kasi.penelitian-baru');
        Route::put('penelitian-baru/{id}', [NewApplicationKasiController::class, 'update'])->name('kasi.penelitian-baru-update');
        Route::get('lihat-penelitian/{id}', [NewApplicationKasiController::class, 'show'])->name('kasi.lihat-penelitian');
        Route::get('penelitian-terproses', [ProcessedApplicationKasiController::class, 'index'])->name('kasi.penelitian-terproses');
        Route::get('profile-pemohon/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('kasi.profile-pemohon');
        Route::get('profile', [ProfileKasiController::class, 'index'])->name('kasi.profile');
        Route::put('profile/{id}', [ProfileKasiController::class, 'update'])->name('kasi.profile-update');
    });
// petugas
Route::prefix('petugas')
    ->middleware(['auth', 'petugas', 'verified'])
    ->group(function () {
        Route::get('/', [PetugasDashboardController::class, 'index'])
            ->name('petugas.dashboard');
        Route::get('penelitian-baru', [NewApplicationPetugasController::class, 'index'])->name('petugas.penelitian-baru');
        Route::put('penelitian-baru/{id}', [NewApplicationPetugasController::class, 'update'])->name('petugas.penelitian-baru-update');
        Route::resource('penelitian-baru-petugas', NewApplicationPetugasController::class);
        Route::resource('penelitian-terproses-petugas', ProcessedApplicationPetugasController::class);
        Route::get('penelitian-terproses', [ProcessedApplicationPetugasController::class, 'index'])->name('petugas.penelitian-terproses');
        Route::resource('profile-petugas', ProfilePetugasController::class);
        Route::get('profile-pemohon-petugas/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('profile-pemohon-petugas');

        Route::get('profile-pemohon/{id}', [NewApplicationPetugasController::class, 'profile_pemohon'])->name('petugas.profile-pemohon');
        Route::get('profile', [ProfilePetugasController::class, 'index'])->name('petugas.profile');
        Route::put('profile/{id}', [ProfilePetugasController::class, 'update'])->name('petugas.profile-update');

        Route::get('pesan', [MessagesController::class, 'index'])->name('petugas.pesan');
        Route::get('generate-penelitian/{id}', [NewApplicationPetugasController::class, 'generate_penelitian'])->name('generate-penelitian');
        Route::put('simpan-surat/{id}', [NewApplicationPetugasController::class, 'simpan_surat_penelitian'])->name('simpan-surat');
    });
// admin
Route::prefix('admin')
    ->middleware(['auth', 'admin', 'verified'])
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
        Route::resource('profile-admin', ProfileAdminController::class);
        Route::resource('users', UserController::class);
        Route::get('restore-user/{id}', [UserController::class, 'restore'])->name('restore-user');
        Route::put('verif-email/{id}', [UserController::class, 'verifemail'])->name('verif-email');
        Route::get('pengguna', [UserController::class, 'pengguna'])->name('pengguna');
    });

Route::prefix('pemohon')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::resource('permohonan', ApplicationController::class);
        Route::post('revisi', [ApplicationController::class, 'revisi'])->name('revisi');
        Route::resource('profile', ApplicantController::class);
        Route::put('ganti-profil/{id}', [ApplicantController::class, 'imageprofile',])->name('imageprofile');
    });
// Route::get('/permohonan/edit/{id}',  \App\Http\Livewire\Permohonan\Edit::class)->middleware(['auth', 'verified'])->name('permohonan-user.edit');
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('simpan-pesan', [HomeController::class, 'store'])->name('simpan-pesan');