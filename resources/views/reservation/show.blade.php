@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            {{ $package->hotel->name }}
                        </h1>
                    </div>

                    <div class="card-body">
                        <img src="{{ $package->hotel->getFirstMediaUrl('images') }}" class="img-fluid mb-3"
                            alt="{{ $package->hotel->name }}">
                        <div>
                            {!! $package->hotel->description !!}
                        </div>
                        <ul class="list-unstyled mt-5">
                            <li>Address : {{ $package->hotel->address }}</li>
                            <li>Health & Safety : {{ $package->hotel->health_and_safety }}</li>
                            <li>Phone : {{ $package->hotel->phone }}</li>
                            <li>Email : {{ $package->hotel->email }}</li>
                            <li>Website : {{ $package->hotel->website }}</li>
                        </ul>

                        <div class="row">
                            <div class="col-6">
                                <h3>Package Details</h3>
                                <ul class="list-unstyled">
                                    <li>Name : {{ $package->title }}</li>
                                    <li>Price : {{ $package->description }}</li>
                                    <li>Price Fixed : LKR {{ number_format($package->price_fixed, 2) }}</li>
                                    <li>Price Per Person : LKR {{ number_format($package->price_per_person, 2) }}</li>
                                    <li>price Perday : LKR {{ number_format($package->price_perday, 2) }}</li>
                                    <li>Occupancy : {{ $package->occupancy }}</li>
                                    <li>Nationality : {{ $package->nationality }}</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('reservation.reserve', $package->id) }}" method="POST">
                                    @csrf

                                    <h3>Book Now</h3>

                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="reservation_start">Check In</label>
                                            <input type="date" name="reservation_start" id="reservation_start"
                                                class="form-control">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="reservation_end">Check Out</label>
                                            <input type="date" name="reservation_end" id="reservation_end" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="number_of_people">Adults</label>
                                        <input type="number" name="number_of_people" id="number_of_people" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
