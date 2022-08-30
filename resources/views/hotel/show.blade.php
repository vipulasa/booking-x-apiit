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
                        <img src="{{ $hotel->getFirstMediaUrl('images') }}" class="img-fluid mb-3"
                            alt="{{ $hotel->name }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
