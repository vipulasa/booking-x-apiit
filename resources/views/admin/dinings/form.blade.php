@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-white p-4">
                <form action="{{ $model->id ? route('admin.dinings.update', $model->id) : route('admin.dinings.store') }}"
                    method="POST" enctype="multipart/form-data">
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

                    <div class="col-md-12">
                        <x-form-input id="title" name="title" label="Title" type="text" value="{{ $model->title }}"
                            help="Title" required />
                    </div>

                    <div class="col-12">
                        <x-form-textarea id="description" name="description" label="Description" type="text"
                            value="{{ $model->description }}" help="Description" ckeditor="true" required />
                    </div>

                    <div class="col-12">
                        <x-form-features :value="$model->features" required />
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <x-form-input id="sort_order" name="sort_order" label="Sort Order" type="number"
                                    value="{{ $model->sort_order }}" help="Sort order of the pages" />
                            </div>
                            <div class="col-6">
                                <label for="status" class="form-label d-block">Status</label>
                                <input type="checkbox" class="form-check-input" id="status" name="status"
                                    aria-describedby="statusHelp" value="1"
                                    {{ old('status', $model->status) ? 'checked' : '' }} />
                                <label for="status" class="form-label ms-2">Active</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
