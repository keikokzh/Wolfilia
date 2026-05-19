<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;

// ── Landing Page ──
Route::get('/', [LandingController::class, 'index'])->name('landing');

// ── Auth Routes ──
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ── Admin Routes (role: admin) ──
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::patch('/seed-request/{seedRequest}', [AdminDashboardController::class, 'updateSeedRequest'])->name('seed-request.update');
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
    Route::patch('/user/{user}/role', [AdminDashboardController::class, 'updateUserRole'])->name('user.role');
    Route::delete('/user/{user}', [AdminDashboardController::class, 'deleteUser'])->name('user.delete');
});

// ── Customer Routes (role: customer) ──
Route::prefix('customer')->name('customer.')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/', [CustomerDashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Panen
    Route::get('/manajemen', [CustomerDashboardController::class, 'manajemen'])->name('manajemen');
    Route::post('/prediksi', [CustomerDashboardController::class, 'hitungPrediksi'])->name('prediksi');
    Route::patch('/prediksi/{prediction}/status', [CustomerDashboardController::class, 'updateStatusPrediksi'])->name('prediksi.status');
    Route::delete('/prediksi/{prediction}', [CustomerDashboardController::class, 'hapusPrediksi'])->name('prediksi.hapus');
    Route::post('/panen', [CustomerDashboardController::class, 'simpanPanen'])->name('panen.simpan');
    Route::get('/panen/{log}/edit', [CustomerDashboardController::class, 'editPanen'])->name('panen.edit');
    Route::put('/panen/{log}', [CustomerDashboardController::class, 'updatePanen'])->name('panen.update');
    Route::delete('/panen/{log}', [CustomerDashboardController::class, 'hapusPanen'])->name('panen.hapus');

    // Request Bibit
    Route::get('/request', [CustomerDashboardController::class, 'requestBibit'])->name('request');
    Route::post('/seed-request', [CustomerDashboardController::class, 'storeSeedRequest'])->name('seed-request.store');
    Route::delete('/seed-request/{seedRequest}', [CustomerDashboardController::class, 'deleteSeedRequest'])->name('seed-request.delete');
});

// ── Modul Edukasi & SOP (accessible to all authenticated users) ──
Route::middleware('auth')->group(function () {
    Route::prefix('edukasi')->name('edukasi.')->group(function () {
        Route::get('/panduan-budidaya', [EdukasiController::class, 'panduan'])->name('panduan');
        Route::get('/pengolahan-produk', [EdukasiController::class, 'pengolahan'])->name('pengolahan');
        Route::get('/pemecahan-masalah', [EdukasiController::class, 'pemecahan'])->name('pemecahan');
    });
});

// ── Wolfilium Management System (admin only) ──
Route::prefix('manajemen')->name('manajemen.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [ManajemenController::class, 'index'])->name('index');

    // Kalkulator Prediksi Panen
    Route::post('/prediksi', [ManajemenController::class, 'hitungPrediksi'])->name('prediksi');
    Route::patch('/prediksi/{prediction}/status', [ManajemenController::class, 'updateStatusPrediksi'])->name('prediksi.status');
    Route::delete('/prediksi/{prediction}', [ManajemenController::class, 'hapusPrediksi'])->name('prediksi.hapus');

    // Log Pencatatan Panen (CRUD)
    Route::post('/panen', [ManajemenController::class, 'simpanPanen'])->name('panen.simpan');
    Route::get('/panen/{log}/edit', [ManajemenController::class, 'editPanen'])->name('panen.edit');
    Route::put('/panen/{log}', [ManajemenController::class, 'updatePanen'])->name('panen.update');
    Route::delete('/panen/{log}', [ManajemenController::class, 'hapusPanen'])->name('panen.hapus');
});

// ── Distribution Bridge / Katalog Peternak (admin only) ──
Route::prefix('distribusi')->name('distribusi.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [FarmerController::class, 'index'])->name('index');
    Route::post('/', [FarmerController::class, 'store'])->name('store');
    Route::put('/{farmer}', [FarmerController::class, 'update'])->name('update');
    Route::delete('/{farmer}', [FarmerController::class, 'destroy'])->name('destroy');
});
