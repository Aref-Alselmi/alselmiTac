<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/services/{id}', [ServiceController::class, 'show'])
    ->name('services.show');
Route::get('/', [ServiceController::class, 'home'])->name('home');

// Contact page
Route::get('/contact', function () {
    return view('partials.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Contact status management
    Route::patch('/contacts/{contact}/status', [ContactController::class, 'updateStatus'])
        ->name('contacts.status');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Services
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('services', ServiceController::class)
            ->except(['show']);
    });

});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
