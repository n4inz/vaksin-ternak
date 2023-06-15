<?php

use App\Http\Controllers\HomeController;
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


// User Vasinatore
Route::get('/vaksinator/user', [VaksinatorController::class , 'index'])->name('vaksinator.index');
Route::get('/vaksinator/user/add', [VaksinatorController::class , 'addVaksinator'])->name('vaksinator.add');

