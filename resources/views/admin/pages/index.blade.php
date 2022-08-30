@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-3 text-end">
                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                    Add Page
                </a>
            </div>
            <div class="col-md-12 bg-white">
                <x-model-list :columns="[
                                'title',
                                'url',
                                'created_at',
                                'status',
                            ]"
                            :models="$pages" />
            </div>
        </div>
    </div>
@endsection
