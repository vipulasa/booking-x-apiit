<?php

namespace App\Http\Controllers;

use App\Models\Finance\Package;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __invoke(Package $package)
    {
        dd($package);
    }
}
