{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- User Name -->
        <div>
            <x-input-label for="username" :value="__('User-Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <!-- NID -->
        <div>
            <x-input-label for="nid" :value="__('NID')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="nid" :value="old('nid')" required autofocus autocomplete="nid" />
            <x-input-error :messages="$errors->get('nid')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/style.css">

    <title>Signup #6</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('frontend/assets/img/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <h3>Sign Up</h3>

                        </div>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group last">
                                    <label for="username">Full Name</label>
                                    <input type="text" class="form-control" id="username" autocomplete="nope"
                                        name="name">
                                </div>
                                @error('name')
                                <span class="text-danger caption">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-group last">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" id="username" autocomplete="nope"
                                        name="email">
                                </div>
                                @error('email')
                                <span class="text-danger caption">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-group last">
                                    <label for="username">NID</label>
                                    <input type="text" class="form-control" id="username" autocomplete="nope"
                                        name="nid">
                                </div>
                                @error('nid')
                                <span class="text-danger caption">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-group last">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" autocomplete="nope"
                                        name="password">
                                </div>
                                @error('password')
                                <span class="text-danger caption">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-group last">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" autocomplete="nope"
                                        name="password_confirmation">
                                </div>
                                @error('password_confirmation')
                                <span class="text-danger caption">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <input type="submit" value="Sign Up" class="btn btn-block btn-primary">
                            </div>


                            <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

                            <div class="social-login">
                                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                                    <span class="icon-google me-3"></span> Signup with Google
                                </a>
                            </div>
                            <div class="d-grid gap-2">
                                <p class="text-center mt-3">Already have an account? <a href="{{ url('login') }}">Login here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="{{ asset('frontend') }}/assets/js/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend') }}/assets/js/login.js"></script>
</body>

</html>