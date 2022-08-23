@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 bg-white p-4">
                <form action="{{ $user->id ? route('users.update', $user->id) : route('users.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @if ($user->id)
                        @method('PUT')
                    @endif

                    @csrf

                    <div class="col">
                        <h4>Authentication Details</h4>
                        <hr>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-form-input id="name" name="name" label="User Name" type="text"
                                value="{{ $user->name }}" help="User Name" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input id="email" name="email" label="Email" type="email"
                                value="{{ $user->email }}" help="Users Primary Email Address" />
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <x-form-input id="password" name="password" label="Password" type="password" value=""
                                help="Min 8" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input id="password_confirmation" name="password_confirmation" label="Confirm Password"
                                type="password" value="" help="" />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <h4>Personal Details</h4>
                            <hr>
                        </div>

                        <div class="col-12">
                            <x-form-input id="avatar" name="avatar" label="Profile Image" type="file" value="{{ $user->avatar }}"
                                help="Please upload an image with the resolution of 180px X 180px" />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-input id="first_name" name="first_name" label="First Name" type="text"
                                        value="{{ $user->first_name }}" help="First Name" />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input id="last_name" name="last_name" label="Last Name" type="text"
                                        value="{{ $user->last_name }}" help="Last Name" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-input id="phone" name="phone" label="Phone" type="text"
                                        value="{{ $user->phone }}" help="Phone Number" />
                                </div>

                                <div class="col-md-6">
                                    <x-form-input id="nic" name="nic" label="National Identity Card Number"
                                        type="text" value="{{ $user->nic }}" help="NIC or Passport Number" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <x-form-input id="address" name="address" label="Address" type="text"
                                value="{{ $user->address }}" help="" />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <x-form-input id="city" name="city" label="City" type="text"
                                        value="{{ $user->city }}" help="" />
                                </div>

                                <div class="col-4">
                                    <x-form-input id="state" name="state" label="State" type="text"
                                        value="{{ $user->state }}" help="" />
                                </div>

                                <div class="col-2">
                                    <x-form-input id="zip" name="zip" label="Postal Code" type="text"
                                        value="{{ $user->zip }}" help="" />
                                </div>

                                <div class="col-2">
                                    <x-form-input id="country" name="country" label="Country" type="text"
                                        value="{{ $user->country }}" help="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h4>User Role</h4>
                            <hr>
                        </div>
                        <div class="col-12">
                            <x-form-select id="role" name="role" label="Role" value="{{ $user->role }}"
                                help="User role" placeholder="Select Role" :options="['admin', 'user', 'manager']" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
