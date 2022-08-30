<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

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
    public function index()
    {
        resolve('BookingXApiit')->setUrl('home');

        // get 10 hotels orderd by the created date
        $hotels = (new Hotel())
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('home', [
            'hotels' => $hotels
        ]);
    }
}
