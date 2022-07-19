<?php

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

Auth::routes();

Route::get('/dev', function () {

    $admin =  \App\Models\Auth\User::create([
        'name' => 'Administrator',
        'email' => now()->timestamp . 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => \Illuminate\Support\Str::random(10),

        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone' => '+94777079697',
        'nic' => '9999999999v',
        'address' => 'Sample Address',
        'city' => 'Dehiwala',
        'state' => 'Western Province',
        'zip' => '10350',
        'country' => 'LK',
        'settings' => [
            'language' => 'en',
            'timezone' => 'Asia/Colombo',
            'currency' => 'LKR',
            'notifications' => [
                'email' => true,
                'push' => true,
                'sms' => true,
            ]
        ],
        'role' => 'admin',
    ]);

    // $admin = \App\Models\Auth\User::withTrashed()->find(39);

    dd($admin, $admin->phone);


    dd('dev');
});

Route::get('/home', [
    App\Http\Controllers\HomeController::class, 'index',
])->name('home');

Route::get('/', function () {
    return view('home');
});
