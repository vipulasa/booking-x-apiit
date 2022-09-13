@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-2 bg-white rounded shadow-sm pt-2">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li class="p-2 rounded {{ request()->get('cid') == $category->id ? 'bg-info' : '' }}">
                            <a href="{{ route('home') }}?cid={{ $category->id }}" class="text-black text-decoration-none">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-10">
                <div class="row">

                    @if ($hotels && $hotels->count())
                        @foreach ($hotels as $hotel)
                            <div class="col-md-4">
                                <div class="card rounded shadow-sm">
                                    <div class="card-header m-0 p-0">
                                        <img src="{{ $hotel->getFirstMediaUrl('images', 'thumb') }}"
                                            alt="{{ $hotel->name }}" class="w-100">
                                    </div>
                                    <div class="card-body">
                                        <h2>{{ $hotel->name }}</h2>
                                        <small>{{ $hotel->category->title }}</small>
                                        <p>{{ Str::limit(strip_tags($hotel->description), 100, '...') }}</p>
                                        <a href="{{ route('hotels.show', $hotel->url) }}" class="btn btn-primary">View</a>
                                        <div class="mt-3">
                                            @foreach ($hotel->categories as $category)
                                                <a href="{{ route('home') }}?cid={{ $category->id }}">
                                                    <span class="badge bg-secondary">{{ $category->title }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="p-5 mb-4 bg-white rounded-3 m-4">
                            <div class="container-fluid py-5">
                                <h1 class="display-5 fw-bold">Sorry</h1>
                                <p class="col-md-8 fs-4">No hotels found for this category</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
