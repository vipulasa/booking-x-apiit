<?php

use App\Models\Content\Page;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    // 'login' => false
]);

// Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');

Route::get('/dev', function () {

    dd(Gate::allows('admin'));

    dd(resolve('BookingXApiit'));

    // dd(resolve('view'));

    // $user = (new \App\Models\Auth\User)->where('role', 'admin')->first();

    // debug($user);

    // dd($user);

    // dd((new Page()));

    // dd('dev');

    return view('home');
});

Route::middleware(['auth:web'])->get('/reservation/{package}', [App\Http\Controllers\ReservationController::class, 'show'])->name('reservation.show');

Route::middleware(['auth:web'])
->post('/reservation/{package}', [App\Http\Controllers\ReservationController::class, 'reserve'])
->name('reservation.reserve');

Route::middleware(['auth:web'])
->get('/reservations', [App\Http\Controllers\ReservationController::class, 'index'])
->name('reservation.index');

Route::get('/hotel/{url}', App\Http\Controllers\HotelController::class)->name('hotels.show');

Route::get('/category/{id}', App\Http\Controllers\CategoryController::class)
    ->name('categories.show');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{url}', App\Http\Controllers\PageController::class)->name('pages.show');
