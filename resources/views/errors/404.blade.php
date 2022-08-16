@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        404
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        The page you are looking for could not be found.
                    </p>
                    <p>
                        <a href="{{ route('home') }}">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Go to the home page
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
