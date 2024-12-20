<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
// Auth routes
Route::post('register', [AuthController::class, 'register']);  // Registrasi
Route::post('login', [AuthController::class, 'login']);  // Login

// User - Hanya pengguna yang terautentikasi yang bisa mengakses
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Layanan - Tersedia untuk semua pengguna
Route::get('/services', [ServiceController::class, 'index']);  // Menampilkan daftar layanan

// Booking - Hanya pengguna terautentikasi yang dapat membuat pemesanan
Route::middleware('auth:sanctum')->post('/bookings', [BookingController::class, 'store']);  // Membuat pemesanan
Route::middleware('auth:sanctum')->get('/bookings/{id}', [BookingController::class, 'show']);  // Melihat status pemesanan

// Review - Hanya pengguna terautentikasi yang bisa memberikan ulasan
Route::middleware('auth:sanctum')->post('/reviews', [ReviewController::class, 'store']);  // Memberikan ulasan terhadap layanan

// Administrator - Hanya pengguna dengan role 'admin' yang bisa mengelola layanan dan booking
Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {

    // Admin routes untuk mengelola layanan
    Route::get('/services', [ServiceController::class, 'index']); // Menampilkan daftar layanan
    Route::post('/services/store', [ServiceController::class, 'store']);  // Menambah layanan baru
    Route::put('/services/{id}', [ServiceController::class, 'update']);  // Mengupdate layanan
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);  // Menghapus layanan

    // Admin routes untuk mengelola booking
    Route::get('/bookings', [BookingController::class, 'index']);  // Melihat semua pemesanan
    Route::put('/bookings/{id}', [BookingController::class, 'update']);  // Mengupdate status pemesanan
});
