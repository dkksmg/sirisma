<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha'])->name('reloadCaptcha');
Route::get('/login-admin', [AuthAdminController::class, 'index'])->name('login-admin');
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

// Admin
Route::prefix('admin')
    // ->namespace('Admin')
    ->middleware(['auth', 'admin', 'verified'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });

Route::resource('permohonan', ApplicationController::class)->middleware(['auth', 'verified']);
Route::put('sanggah-permohonan', [ApplicationController::class, 'sanggah'])->middleware(['auth', 'verified'])->name('sanggah-permohonan');
Route::resource('profile', ApplicantController::class)->middleware(['auth', 'verified']);
Route::put('ganti-profil/{id}', [ApplicantController::class, 'imageprofile',])->name('imageprofile');
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('simpan-pesan', [HomeController::class, 'store'])->name('simpan-pesan');