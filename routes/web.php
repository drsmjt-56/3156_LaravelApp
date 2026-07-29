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
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Organizer\DashboardController as OrganizerDashboardController;
use App\Http\Controllers\Organizer\EventController as OrganizerEventController;
use App\Http\Controllers\OrganizationController as UserOrganizationController;


// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/organizations/{organization}', [UserOrganizationController::class, 'show'])
    ->name('organizations.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [HomeController::class, 'ticket'])
->name('ticket');

Route::get('/login', function () {
    return view('auth.user-login');
})->name('user.login');

Route::get('/partners/{partner}', [App\Http\Controllers\PartnerController::class, 'show'])
->name('partners.show');

// ======================
// LOGIN GOOGLE (USER)
// ======================
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');

//REVIEW
//Route::middleware('auth')->group(function () {
    Route::get('/review/{transaction}', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review/{transaction}', [ReviewController::class, 'store'])->name('review.store');
//}); 

//Checkout
Route::get('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');
Route::post('checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/payment/{order_id}',
[\App\Http\Controllers\CheckoutController::class, 'payment'])->name
('checkout.payment');

Route::get('/success/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');

Route::post('/midtrans/callback', [\App\Http\Controllers\MidtransWebhookController::class, 'handle']);

// Rute Admin Area
Route::prefix('admin')->name('admin.')->group(function () {
    //Login bebas akses
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //harus login dulu
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', EventController::class);
        Route::resource('organizations', OrganizationController::class);
        Route::patch('organizations/{organization}/approve',[OrganizationController::class, 'approve'])->name('organizations.approve');
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

//route organizer
Route::prefix('organizer')
    ->name('organizer.')
    ->middleware(['auth', 'organizer'])
    ->group(function () {

        // Dashboard Organizer
        Route::get('/dashboard', [OrganizerDashboardController::class, 'index'])
            ->name('dashboard');

        // Kelola Event Organizer
        Route::resource('events', OrganizerEventController::class);

        // Analitik Pendapatan
        Route::get('/analytics', [OrganizerDashboardController::class, 'analytics'])
            ->name('analytics');

    });

        