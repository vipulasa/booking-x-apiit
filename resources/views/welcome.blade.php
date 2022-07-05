<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>


        <div class="row mt-4">
            <div class="col">
                <div x-data="{
                    open: false,
                    firstName: '',
                    lastName: '',
                    userName: ''
                }">
                    <button x-on:click="open = !open" class="btn btn-sm btn-primary">
                        <span x-show="!open">Show</span>
                        <span x-show="open">Hide</span>
                        Alert
                    </button>

                    <div x-show="open" class="alert alert-success mt-4">
                        Hello I'm an alert and I'm visible only when the button is clicked.
                        </span>
                    </div>

                    <div class="mt-4">
                        <form class="row g-3 needs-validation">
                            <div class="col-md-4">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" x-model="firstName" required>
                            </div>
                            <div class="col-md-4">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" x-model="lastName" required>
                            </div>
                            <div class="col-md-4">
                                <label for="userName" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="userName" x-model="userName"
                                        required>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">
                            Hello, <span x-text="firstName"></span> <span x-text="lastName"></span>
                        </h1>
                        <p class="col-md-8 fs-4">
                            Hi, <span x-text="firstName"></span>. Welcome to Booking X APIIT.
                            You can click on the below button to login to the system using your username.
                        </p>
                        <button class="btn btn-primary btn-lg" type="button">
                            @<span x-text="userName"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
</body>

</html>
