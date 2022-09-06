<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $url)
    {

        $hotel = (new Hotel())
            ->newQuery()
            ->where('url', $url)
            ->first();

        if (!$hotel) {
            abort(404);
        }

        return view('hotel.show', [
            'hotel' => $hotel
        ]);
    }
}
