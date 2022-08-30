@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $hotel->name }}</h1>
                    </div>

                    <div class="card-body">
                        <img src="{{ $hotel->getFirstMediaUrl('images') }}" class="img-fluid mb-3" alt="{{ $hotel->name }}">
                        <div>
                            {!! $hotel->description !!}
                        </div>
                        <ul class="list-unstyled mt-5">
                            <li>Address : {{ $hotel->address }}</li>
                            <li>Health & Safety : {{ $hotel->health_and_safety }}</li>
                            <li>Phone : {{ $hotel->phone }}</li>
                            <li>Email : {{ $hotel->email }}</li>
                            <li>Website : {{ $hotel->website }}</li>
                        </ul>

                        <h3>Accommodations</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach ($hotel->accommodations as $accommodation)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="header-{{ $accommodation->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $accommodation->id }}" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            {{ $accommodation->room_type }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $accommodation->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="header-{{ $accommodation->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled">
                                                <li>Occupancy : {{ $accommodation->occupancy }}</li>
                                                <li>Number of rooms : {{ $accommodation->number_of_rooms }}</li>
                                                <li>Room size : {{ $accommodation->room_size }}</li>
                                                <li>Room view : {{ $accommodation->room_view }}</li>
                                                <li>Beds : {{ $accommodation->beds }}</li>
                                                <li>Bathrooms : {{ $accommodation->bathrooms }}</li>
                                            </ul>
                                            <h5>Features</h5>
                                            <div class="row">
                                                @foreach ($accommodation->features as $feature)
                                                    <div class="p-2 bg-white m-2 rounded shadow-sm col-2">{{ $feature }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
