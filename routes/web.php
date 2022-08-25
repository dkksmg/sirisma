<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;

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
Route::prefix('permohonan')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name(
            'permohonan'
        );
        Route::get('/tambah', [ApplicationController::class, 'input'])->name(
            'permohonan.tambah'
        );
        Route::post('/getkotakab', [
            ApplicantController::class,
            'getkotakab',
        ])->name('getkotakab');
        Route::post('/getkecamatan', [
            ApplicantController::class,
            'getkecamatan',
        ])->name('getkecamatan');
        Route::post('/getkeldesa', [
            ApplicantController::class,
            'getkeldesa',
        ])->name('getkeldesa');
        Route::post('/getdataedit', [
            ApplicantController::class,
            'getdataedit',
        ])->name('getdataedit');
    });

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('simpan-pesan', [HomeController::class, 'store'])->name('simpan-pesan');

// Route::prefix('profile')
//     ->middleware(['auth', 'verified'])
//     ->group(function () {
//         Route::get('/', [ApplicantController::class, 'index'])
//             ->name('profile');
//         Route::get('create', [ApplicantController::class, 'create'])
//             ->name('profile-create');
//         Route::get('update', [ApplicantController::class, 'update'])
//             ->name('profile-update');
//         Route::post('simpan-profile', [ApplicantController::class, 'store'])
//             ->name('simpan-profile');
//     });
Route::resource('profile', ApplicantController::class)->middleware(['auth', 'verified']);