<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CS\ApplicationCsController;
use App\Http\Controllers\CS\DashboardController;
use App\Http\Controllers\CS\NewApplicationCsController;
use App\Http\Controllers\CS\ProccesedApplicationCsController;
use App\Http\Controllers\CS\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kabid\DashboardController as KabidDashboardController;
use App\Http\Controllers\Kasi\DashboardController as KasiDashboardController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
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
        Route::resource('permohonan-baru', NewApplicationCsController::class);
        Route::resource('permohonan-terproses', ProccesedApplicationCsController::class);
        Route::resource('profile-cs', ProfileController::class);
    });
// Kabid
Route::prefix('kabid')
    ->middleware(['auth', 'kabid', 'verified'])
    ->group(function () {
        Route::get('/', [KabidDashboardController::class, 'index'])
            ->name('dashboard-kabid');
    });
// Kasi
Route::prefix('kasi')
    ->middleware(['auth', 'kasi', 'verified'])
    ->group(function () {
        Route::get('/', [KasiDashboardController::class, 'index'])
            ->name('dashboard-kasi');
    });
// petugas
Route::prefix('petugas')
    ->middleware(['auth', 'petugas', 'verified'])
    ->group(function () {
        Route::get('/', [PetugasDashboardController::class, 'index'])
            ->name('dashboard-petugas');
    });
// admin
Route::prefix('admin')
    ->middleware(['auth', 'admin', 'verified'])
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard-admin');
    });

Route::resource('permohonan', ApplicationController::class)->middleware(['auth', 'verified']);
Route::post('revisi', [ApplicationController::class, 'revisi'])->middleware(['auth', 'verified'])->name('revisi');
Route::resource('profile', ApplicantController::class)->middleware(['auth', 'verified']);
Route::put('ganti-profil/{id}', [ApplicantController::class, 'imageprofile',])->name('imageprofile');
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('simpan-pesan', [HomeController::class, 'store'])->name('simpan-pesan');