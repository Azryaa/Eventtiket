<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController; // Controller Kategori Admin
use App\Http\Controllers\PartnerController;        // Controller Partner Admin

// Rute User Area (Halaman Publik)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class,'show'])->name('events.show');
Route::get('/checkout', [EventController::class,'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// Rute Admin Area (Panel Admin)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/transactions', [DashboardController::class,'indexTransaction'])->name('transactions.index');
    
    Route::resource('events', EventAdminController::class);
    
    // Soal 1 & 3: Rute Modul Kategori (Menggunakan Resource agar ringkas)
    Route::resource('categories', CategoryController::class);

    // Soal 2 & 3: Rute Modul Partner
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('/partners/{id}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');
});