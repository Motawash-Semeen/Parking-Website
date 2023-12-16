@extends('master')
@section('frontend.content')
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
                                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                                    <span class="icon-google me-3"></span> Signup with Google
                                </a>
                            </div>
                            <div class="d-grid gap-2">
                                <p class="text-center mt-3">Already have an account? <a href="{{ url('login') }}">Login
                                        here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
