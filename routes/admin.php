<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth:admin'],
    'as' => 'admin.'
], function () {

    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    // Pages
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);

    // Bookings
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class);

    // Packages
    Route::resource('packages', App\Http\Controllers\Admin\PackageController::class);

    // Promotions
    Route::resource('promotions', App\Http\Controllers\Admin\PromotionController::class);

    // Accommodations
    Route::resource('accommodations', App\Http\Controllers\Admin\AccommodationController::class);

    // Dinings
    Route::resource('dinings', App\Http\Controllers\Admin\DiningController::class);

    // Experiences
    Route::resource('experiences', App\Http\Controllers\Admin\ExperienceController::class);

    // Facilities
    Route::resource('facilities', App\Http\Controllers\Admin\FacilityController::class);

    // Categories
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    // Hotels
    Route::resource('hotels', App\Http\Controllers\Admin\HotelController::class);
});
