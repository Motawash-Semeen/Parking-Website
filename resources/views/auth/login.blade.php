{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
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

    <title>Login #6</title>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('frontend/assets/img/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            @if (request()->is('login'))
                                <h3>Sign In</h3>
                            @else
                                <h3>Sign Up</h3>
                            @endif
                        </div>
                        @if (request()->is('login'))
                            <form action="{{ route('login') }}" method="post">
                                @csrf
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
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" autocomplete="nope"
                                            name="password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger caption">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" name="remember" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ms-auto"><a href="{{ route('password.request') }}"
                                            class="forgot-pass">Forgot Password</a></span>
                                </div>

                                <div class="d-grid gap-2">
                                    <input type="submit" value="Log In" class="btn btn-block btn-primary">
                                </div>


                                <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

                                <div class="social-login">
                                    <a href="#"
                                        class="google btn d-flex justify-content-center align-items-center">
                                        <span class="icon-google me-3"></span> Login with Google
                                    </a>
                                </div>
                                <div class="d-grid gap-2">
                                    <p class="text-center mt-3">Don't have account? <a href="{{ url('register') }}">Sign
                                            up here</a></p>
                                </div>
                            </form>
                        @elseif(request()->is('register'))
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
                                        <input type="password" class="form-control" id="password_confirmation"
                                            autocomplete="nope" name="password_confirmation">
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
                                    <a href="#"
                                        class="google btn d-flex justify-content-center align-items-center">
                                        <span class="icon-google me-3"></span> Signup with Google
                                    </a>
                                </div>
                                <div class="d-grid gap-2">
                                    <p class="text-center mt-3">Already have an account? <a
                                            href="{{ url('login') }}">Login here</a></p>
                                </div>
                            </form>
                        @endif

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
