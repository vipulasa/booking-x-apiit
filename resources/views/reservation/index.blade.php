@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>My Reservations</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Hotel</th>
                            <th scope="col">Package</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->package->hotel->name }}</td>
                                <td>{{ $booking->package->title }}</td>
                                <td>{{ $booking->reservation_start }}</td>
                                <td>{{ $booking->reservation_end }}</td>
                                <td>LKR {{ number_format($booking->total_price, 2) }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    {{-- <a href="{{ route('reservation.show', $booking->id) }}" class="btn btn-primary">View</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
