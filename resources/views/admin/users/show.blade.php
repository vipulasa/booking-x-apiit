@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bg-white p-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <img alt="{{ $user->name }}" src="/storage/{{ $user->avatar }}"
                                class="w-100 img-circle img-responsive">
                        </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>{{ $user->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>{{ $user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIC</td>
                                        <td>{{ $user->nic }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $user->city }}</td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>{{ $user->state }}</td>
                                    </tr>
                                    <tr>
                                        <td>Zip</td>
                                        <td>{{ $user->zip }}</td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>{{ $user->country }}</td>
                                    </tr>
                                    <tr>
                                        <td>Settings</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
