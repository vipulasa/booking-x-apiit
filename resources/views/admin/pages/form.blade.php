@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 bg-white p-4">
                <form action="{{ $model->id ? route('admin.pages.update', $model->id) : route('admin.pages.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @if ($model->id)
                        @method('PUT')
                    @endif
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <h4>Page Content</h4>
                            <hr>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <x-form-input id="title" name="title" label="Title" type="text"
                                        value="{{ $model->title }}" help="Title" />
                                </div>
                                <div class="col-md-4">
                                    <x-form-input id="url" name="url" label="URL" type="text"
                                        value="{{ $model->url }}" help="URL" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <x-form-textarea id="summary" name="summary" label="Summary" type="text"
                                value="{{ $model->summary }}" help="Summary" />
                        </div>

                        <div class="col-12">
                            <x-form-textarea id="content" name="content" label="Content" type="text"
                                value="{{ $model->content }}" help="Content" ckeditor="true" />
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <h4>Category</h4>
                                <hr>
                            </div>
                            <div class="col-12">
                                <x-form-select id="category_id" name="category_id" label="Page Category"
                                    value="{{ $model->category_id }}" help="Page Category" placeholder="Select Category"
                                    :options="$categories->pluck('title', 'id')" />
                            </div>
                        </div>

                        <div class="col-12">
                            <x-form-input id="image" name="image" label="Image" type="file"
                                value="{{ $model->getFirstMediaUrl('images', 'thumb') }}" help="" />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <x-form-input id="sort_order" name="sort_order" label="Sort Order" type="number"
                                        value="{{ $model->sort_order }}" help="Sort order of the pages" />
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" class="form-check-input" id="status" name="status"
                                        aria-describedby="statusHelp" value="1"
                                        {{ old('status', $model->status) ? 'checked' : '' }} />
                                    <label for="status" class="form-label ms-2">Status</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
