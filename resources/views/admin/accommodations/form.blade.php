@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-4">
                <form action="{{ $model->id ? route('admin.accommodations.update', $model->id) : route('admin.accommodations.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @if ($model->id)
                        @method('PUT')
                    @endif

                    @csrf

                    <div class="row">
                        <div class="col">
                            <h4>Form Details</h4>
                            <hr>
                        </div>
                    </div>

                    <x-hotel-list :hotel-id="$model->hotel_id" />

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
