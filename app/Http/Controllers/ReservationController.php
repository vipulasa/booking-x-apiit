<?php

namespace App\Http\Controllers;

use App\Models\Finance\Booking;
use App\Models\Finance\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    public function show(Package $package)
    {
        return view('reservation.show', [
            'package' => $package,
        ]);
    }

    public function reserve(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required',
            'user_id' => 'required',
            'reservation_start' => 'required|date',
            'reservation_end' => 'required|date',
            'number_of_people' => 'required',
        ]);

        // load the package using the package_id
        $package = Package::find($request->package_id);

        // calculate the total price
        $total_price_per_day = $package->price_per_person * $request->number_of_people;

        // get the number of days between the reservation start and end
        $number_of_days = Carbon::parse($request->reservation_start)->diffInDays(Carbon::parse($request->reservation_end));

        // calculate the total price
        $total_price = $total_price_per_day * $number_of_days;

        // create the booking
        (new Booking())->create([
            'package_id' => $request->package_id,
            'user_id' => $request->user_id,
            'number_of_days' => $number_of_days,
            'number_of_people' => $request->number_of_people,
            'reservation_start' => $request->reservation_start,
            'reservation_end' => $request->reservation_end,
            'total_price' => $total_price,
            'status' => 1,
        ]);

        return redirect()->route('reservation.index');

    }

    public function index()
    {
        // get the authenticated user
        $user = auth()->user();

        // get the bookings for the authenticated user
        $bookings = $user->bookings;

        return view('reservation.index', [
            'user' => $user,
            'bookings' => $bookings
        ]);
    }
}
