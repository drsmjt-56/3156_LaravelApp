<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

//Checkout
Route::get('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');
Route::post('checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');


// Rute Admin Area
Route::prefix('admin')->name('admin.')->group(function () {
    //Login bebas akses
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //harus login dulu
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', EventController::class);
        Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');

        
    //Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //Partners
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
});
