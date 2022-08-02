<?php

namespace App\Http\Controllers;

use App\BookingXApiit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(BookingXApiit $bookingXApiit)
    {
        resolve('BookingXApiit')->setUrl('home');

        return view('home');
    }
}
