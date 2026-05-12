<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// Rute Admin Area
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);
    Route::get('/transactions', function () {return view('admin.transactions');})->name('transactions.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/partners', [PartnerController::class, 'index'])
    ->name('partners.index');

Route::get('/partners/create', [PartnerController::class, 'create'])
    ->name('partners.create');

Route::post('/partners', [PartnerController::class, 'store'])
    ->name('partners.store');

Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])
    ->name('partners.edit');

Route::put('/partners/{partner}', [PartnerController::class, 'update'])
    ->name('partners.update');

Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])
    ->name('partners.destroy');
    // dan seterusnya...
   });

