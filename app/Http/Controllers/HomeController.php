<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            ->newQuery()
            ->where(function ($query) {
                $query->where('status', 1);
            })
            ->with([
                'categories',
                'media'
            ]);

        // check if the request has a cid param and get the hotels by the category id
        if (request()->has('cid')) {

            $hotels = $hotels
                ->whereHas('categories', function ($query) {
                    $query->where('category_id', request()->get('cid'));
                });
        }

        $hotels = $hotels
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('home', [
            'hotels' => $hotels,
            'categories' => (new Category())
                ->newQuery()
                ->where('status', 1)
                ->get(),
        ]);
    }
}
