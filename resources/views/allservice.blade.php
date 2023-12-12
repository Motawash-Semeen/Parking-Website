@extends('master')
@section('frontend.content')

    <header class="header">
        <div class="container-lg">
            <div class="row nav-design">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/') }}"><img
                                src="{{ asset('frontend') }}/assets/landowner/img/logo.png" alt="Logo"
                                height="60"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon navbar-inverse "></span>
                        </button>

                        <div class=" collapse navbar-collapse" id="navbarNavDropdown header-menu">
                            <ul class="navbar-nav ms-auto ">
                                <li class="nav-item">
                                    <a class="nav-link mx-2" aria-current="page" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="{{ url('service') }}">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="#contact">Conatct & Help</a>
                                </li>

                            </ul>
                            <ul class="navbar-nav ms-auto d-inline-flex justify-content-center btn-main">
                                @if (Auth::user())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"
                                            style="background: rgba(255, 255, 255, 0.2);
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(5px);
                        -webkit-backdrop-filter: blur(5px);">
                                            <li><a class="dropdown-item nav-link" href="{{ url('dashboard') }}">Profile</a>
                                            </li>
                                            <li><a class="dropdown-item nav-link" href="{{ url('logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item mx-lg-2 top-btn">
                                        <a class="nav-link text-dark h5 btn-nav " href="{{ url('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item mx-lg-2 top-btn">
                                        <a class="nav-link text-dark h5 btn-nav" href="{{ url('register') }}">Signup</i></a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="container-body bg-transparent" id="inputLocation">
                <h2 class="my-4 text-center text-white header-text">Search Parking Slot</h2>

                <!-- Add Parking Slot Form -->
                <div class="row align-items-center mt-5">
                    <div class="col-md-8">
                        <div class="m-0 p-0 bg-transparent shadow-none text-white" id="addParkingForm">
                            <div id="geocoder"></div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <h4 class="m-0 text-white text-center mx-auto">OR</h4>
                    </div>
                    <div class="col-md-3 text-center mt-3 mt-md-0">
                        <button class="px-3 py-2 rounded border-0 text-white" style="background-color: #ffde16"
                            type="button" id="locationBtn" onclick="getLocation()">
                            <i class="bi bi-crosshair"></i><span class="ms-2">Current Location</span>
                        </button>
                    </div>

                </div>
                <h3 class="my-4 text-center text-white d-flex justify-content-center">OR</h3>
                <h2 class="my-4 text-center text-white header-text">List your Space</h2>
                <div class="button text-center mt-5">
                    <a href="{{ url('/addParking') }}" class="service-btn">Click Now</a>
                </div>
            </div>
    </header>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
        });

        geocoder.addTo('#geocoder');

        // Add geocoder result to container.
        geocoder.on('result', (e) => {
            //results.innerText = JSON.stringify(e.result.place_name, null, 2);

            const areaName = e.result.place_name;

            // Redirect to the next page with the area name as a parameter
            window.location.href = 'result?area=' + encodeURIComponent(areaName);
        });


        // Clear results container when search is cleared.
        geocoder.on('clear', () => {
            results.innerText = '';
        });
    </script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            window.location.href = 'result?coordinates='+longitude+','+latitude  ;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
@endsection
