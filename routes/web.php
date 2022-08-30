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

Route::get('/', [
    App\Http\Controllers\HomeController::class, 'index'
])->name('home');


Route::get('{url}', App\Http\Controllers\PageController::class)->name('page.show');


