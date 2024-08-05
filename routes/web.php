<?php

use App\Helpers\RSA;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RSACustomController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PelangganController;
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

// Auth
Route::get('/', fn () => redirect('dashboard'));
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
});

// Pelanggan
Route::controller(PelangganController::class)->group(function () {
    Route::get('pelanggan', 'view_pelanggan')->name('pelanggan.view_pelanggan');
    // Route::post('/orders', 'store');
});

Route::get('home', [HomeController::class, 'index']);
