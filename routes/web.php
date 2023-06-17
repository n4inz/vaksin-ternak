<?php

use App\Http\Controllers\DataVaksinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalVaksinController;
use App\Http\Controllers\LandingPageControllrer;
use App\Http\Controllers\VaksinatorController;
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




Route::middleware('tenant')->group(function() {
    Route::get('/test', function () {
        return view('welcome');
    });


});

Route::get('/dashboard', [HomeController::class , 'index'])->name('dashboard.index');

Route::get('/', [LandingPageControllrer::class , 'index'])->name('landingPage.index');
Route::get('/daftar-vaksinasi/{id}', [LandingPageControllrer::class , 'daftarVaksinasi'])->name('landingPage.daftarVaksinasi');
Route::post('/store-vaksinasi', [LandingPageControllrer::class , 'storeVaksinasi'])->name('landingPage.storeVaksinasi');


// User Vasinatore
Route::get('/vaksinator/user', [VaksinatorController::class , 'index'])->name('vaksinator');
Route::get('/vaksinator/user/add', [VaksinatorController::class , 'addVaksinator'])->name('vaksinator.add');
Route::post('/vaksinator/user/store', [VaksinatorController::class , 'storeVaksinator'])->name('vaksinator.store');
Route::delete('/vaksinator/user/delete/{id}', [VaksinatorController::class , 'deleteVaksinator'])->name('vaksinator.delete');


// Data vaksin
Route::get('/data-vaksin', [DataVaksinController::class , 'index'])->name('dataVaksin');
Route::post('/vaksin-store', [DataVaksinController::class , 'storeVaksin'])->name('storeVaksin');
Route::delete('/vaksin-delete/{id}', [DataVaksinController::class , 'deleteVaksin'])->name('deleteVaksin');


// Jadwal vaksin
Route::get('/jadwal-vaksin', [JadwalVaksinController::class , 'index'])->name('jadwal.index');
Route::get('/buat/jadwal-vaksin', [JadwalVaksinController::class , 'createJadwal'])->name('jadwal.createJadwal');
Route::post('/jadwal-vaksin/store', [JadwalVaksinController::class , 'storeJadwal'])->name('jadwal.storeJadwal');

// Vaksinator
Route::get('/jadwal-saya', [JadwalVaksinController::class , 'jadwalSaya'])->name('jadwal.jadwalSaya');


