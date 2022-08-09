<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                        @can('accessAdministration')
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Administration
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            Dashboard
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <small class="d-block ps-2">Authentication</small>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            Users
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <small class="d-block ps-2">Content</small>
                                        <a class="dropdown-item" href="{{ route('pages.index') }}">
                                            Pages
                                        </a>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}">
                                            Categories
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <small class="d-block ps-2">Booking & Reservations</small>

                                        <a class="dropdown-item" href="{{ route('bookings.index') }}">
                                            Bookings
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <small class="d-block ps-2">Hotel</small>

                                        <a class="dropdown-item" href="{{ route('hotels.index') }}">
                                            Hotels
                                        </a>

                                        <a class="dropdown-item" href="{{ route('facilities.index') }}">
                                            Facilities
                                        </a>

                                        <a class="dropdown-item" href="{{ route('dinings.index') }}">
                                            Dinings
                                        </a>

                                        <a class="dropdown-item" href="{{ route('accommodations.index') }}">
                                            Accommodations
                                        </a>

                                        <a class="dropdown-item" href="{{ route('experiences.index') }}">
                                            Experiences
                                        </a>

                                        <a class="dropdown-item" href="{{ route('packages.index') }}">
                                            Packages
                                        </a>

                                        <a class="dropdown-item" href="{{ route('promotions.index') }}">
                                            Promotions
                                        </a>

                                    </div>
                                </li>
                            </ul>
                        @endcan
                    @endauth


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
