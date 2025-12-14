<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;

// Landing Page
Route::view('/', 'index')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/kontak', 'kontak')->name('kontak');
Route::get('/bank', [BankController::class, 'index'])->name('bank');

// Arahkan ke dashboard setelah login
Route::middleware('auth')->get('/dashboard', function () {
    return Auth::user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->name('dashboard');

// User dahboard
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Routing Simulasi Deposito 
    Route::get('/deposit', [DepositController::class, 'index'])->name('user.deposit');
    Route::post('/deposit/calculate', [DepositController::class, 'calculate'])->name('deposit.calculate');
    Route::post('/deposit/save', [DepositController::class, 'save'])->name('deposit.save');

    // Routing Histori Simulasi Deposito
    Route::get('/histori', [DepositController::class, 'history'])->name('user.histori');
    Route::delete('/histori/{id}', [DepositController::class, 'destroy'])->name('histori.destroy');

    // Routing Export PDF & Excel
    Route::get('/histori/export-excel', [DepositController::class, 'userExportExcel'])->name('user.histori.export-excel');
    Route::get('/histori/export-pdf', [DepositController::class, 'userExportPdf'])->name('user.histori.export-pdf');
});

//
// Admin Dashboard
//
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // KELOLA SIMULASI DEPOSITO - ADMIN
    Route::get('/kelola-simulasi', [DepositController::class, 'adminIndex'])->name('admin.kelola-simulasi');
    Route::delete('/kelola-simulasi/{id}', [DepositController::class, 'adminDestroy'])->name('admin.simulasi.destroy');

    // Routing Export - PDF & EXCEL
    Route::get('/kelola-simulasi/export-excel', [DepositController::class, 'exportExcel'])->name('admin.simulasi.export-excel');
    Route::get('/kelola-simulasi/export-pdf', [DepositController::class, 'exportPdf'])->name('admin.simulasi.export-pdf');

    // CRUD user - Admin
    Route::get('user', [UserController::class, 'index'])->name('admin.kelola-user');
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create-user');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit-user');
    Route::put('user/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


    // CRUD BANK - Admin
    Route::get('/kelola-bank', [BankController::class, 'adminIndex'])
        ->name('admin.kelola-bank');
    Route::get('/bank/create', [BankController::class, 'create'])->name('admin.bank.create');
    Route::post('/bank', [BankController::class, 'store'])->name('bank.store');
    Route::get('/kelola-bank/{bank}/edit', [BankController::class, 'edit'])->name('bank.edit');
    Route::put('bank/edit/{bank}', [BankController::class, 'update'])->name('admin.bank.update');
    Route::delete('bank/{bank}', [BankController::class, 'destroy'])
        ->name('bank.destroy');
});


//
// Profile
//
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
