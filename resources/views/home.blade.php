@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($hotels as $hotel)
                <div class="col-md-4">
                    <div class="card rounded shadow-sm">
                        <div class="card-header m-0 p-0">
                            <img src="{{ $hotel->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $hotel->name }}"
                                class="w-100">
                        </div>
                        <div class="card-body">
                            <h2>{{ $hotel->name }}</h2>
                            <small>{{ $hotel->category->title }}</small>
                            <p>{{ Str::limit($hotel->description, 100, '...') }}</p>
                            <a href="{{ route('hotel.show', $hotel->url) }}"
                                class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
