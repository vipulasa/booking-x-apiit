@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-white">
                <x-model-list :columns="[
                                'name',
                                'email',
                                'created_at'
                            ]"
                            :models="$users" />
            </div>
        </div>
    </div>
@endsection
