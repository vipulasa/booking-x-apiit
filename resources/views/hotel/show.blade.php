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
                                                    <div class="p-2 bg-white m-2 rounded shadow-sm col-2">
                                                        {{ $feature }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h3 class="mt-4">Dining</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach ($hotel->dining as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="header-dining-{{ $item->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-dining-{{ $item->id }}" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            {{ $item->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse-dining-{{ $item->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="header-dining-{{ $item->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $item->description }}</p>
                                            <h5>Features</h5>
                                            <div class="row">
                                                @foreach ($item->features as $feature)
                                                    <div class="p-2 bg-white m-2 rounded shadow-sm col-2">
                                                        {{ $feature }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h3 class="mt-4">Facilities</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach ($hotel->facilities as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="header-facilities-{{ $item->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-facilities-{{ $item->id }}" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            {{ $item->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse-facilities-{{ $item->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="header-facilities-{{ $item->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $item->description }}</p>
                                            <h5>Features</h5>
                                            <div class="row">
                                                @foreach ($item->features as $feature)
                                                    <div class="p-2 bg-white m-2 rounded shadow-sm col-2">
                                                        {{ $feature }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h3 class="mt-4">Experiences</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach ($hotel->experiences as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="header-experiences-{{ $item->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-experiences-{{ $item->id }}"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            {{ $item->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse-experiences-{{ $item->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="header-experiences-{{ $item->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $item->description }}</p>
                                            <h5>Features</h5>
                                            <div class="row">
                                                @foreach ($item->features as $feature)
                                                    <div class="p-2 bg-white m-2 rounded shadow-sm col-2">
                                                        {{ $feature }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h3 class="mt-4">Packages</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach ($hotel->packages as $package)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="header-package-{{ $package->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-package-{{ $package->id }}" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            {{ $package->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse-package-{{ $package->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="header-package-{{ $package->id }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $package->description }}</p>
                                            <ul class="list-unstyled">
                                                <li>Occupancy : {{ $package->occupancy }}</li>
                                                <li>Price Fixed: LKR {{ number_format($package->price_fixed, 2) }}</li>
                                                <li>Price per person: LKR {{ number_format($package->price_per_person, 2) }}</li>
                                                <li>price perday: LKR {{ number_format($package->price_perday, 2) }}</li>
                                                <li>Nationality: {{ $package->nationality }}</li>
                                            </ul>
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
