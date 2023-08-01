<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataVaksinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalVaksinController;
use App\Http\Controllers\LandingPageControllrer;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LokasiController;
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

Route::get('/login', [AuthController::class , 'index'])->name('login')->middleware('guest');
Route::post('/login-store', [AuthController::class , 'loginStore'])->name('loginStore');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');




Route::get('/', [LandingPageControllrer::class , 'index'])->name('landingPage.index');
Route::post('/store-vaksinasi', [LandingPageControllrer::class , 'storeVaksinasi'])->name('landingPage.storeVaksinasi');
Route::get('/daftar-vaksinasi', [LandingPageControllrer::class , 'daftarVaksinasi'])->name('landingPage.daftarVaksinasi');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class , 'index'])->name('dashboard.index');
    
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
    Route::get('/detail-pendaftar/{id}', [JadwalVaksinController::class , 'detailPendaftar'])->name('jadwal.detailPendaftar');
    
    Route::post('/jadwal-vaksin/store', [JadwalVaksinController::class , 'storeJadwal'])->name('jadwal.storeJadwal');
    Route::delete('/delete-jadwal/{id}', [JadwalVaksinController::class , 'deleteJadwal'])->name('jadwal.deleteJadwal');

    // Vaksinator
    Route::get('/jadwal-saya', [JadwalVaksinController::class , 'jadwalSaya'])->name('jadwal.jadwalSaya');
    Route::post('/add-jumlah-vaksin', [JadwalVaksinController::class , 'addJumlahVaksin'])->name('jadwal.addJumlahVaksin');


    // Lokasi
    Route::get('/lokasi', [LokasiController::class , 'index'])->name('index.lokasi');
    Route::get('/add-lokasi', [LokasiController::class , 'addLokasi'])->name('lokasi.addLokasi');

    Route::post('/save-lokasi', [LokasiController::class , 'saveLokasi'])->name('lokasi.saveLokasi');
    Route::post('/delete-lokasi', [LokasiController::class , 'delete'])->name('lokasi.delete');


    // Laporan
    Route::get('/laporan', [LaporanController::class , 'index'])->name('index.laporan');
    
});
