<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceControllerWeb;
use App\Http\Controllers\BookingControllerWeb;
use App\Http\Controllers\ReviewControllerWeb;
use App\Http\Controllers\AuthControllerWeb;
use App\Http\Controllers\DashboardController;
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

Route::get('/welcome', function () {
    return view('welcome')->name('welcome');
});
Route::get('/services', [ServiceControllerWeb::class, 'index'])->name('services.index');
Route::get('services/create', [ServiceControllerWeb::class, 'create'])->name('services.create');

Route::post('/services', [ServiceControllerWeb::class, 'store'])->name('services.store');
Route::get('/bookings', [BookingControllerWeb::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingControllerWeb::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingControllerWeb::class, 'store'])->name('bookings.store');
Route::get('/reviews', [ReviewControllerWeb::class, 'index'])->name('reviews.index');
Route::get('reviews/create', [ReviewControllerWeb::class, 'create'])->name('reviews.create');

Route::post('/reviews', [ReviewControllerWeb::class, 'store'])->name('reviews.store');

// Routes untuk login dan register
Route::get('/login', [AuthControllerWeb::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthControllerWeb::class, 'login']);
Route::get('/register', [AuthControllerWeb::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthControllerWeb::class, 'register']);
Route::post('logout', [AuthControllerWeb::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
