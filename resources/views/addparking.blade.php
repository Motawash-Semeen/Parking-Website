@extends('master')
@section('frontend.content')
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
    <style>
        #addParking #addParkingForm {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
        }

        #addParking .header-text {
            font-family: "Raleway", sans-serif;
            font-size: 55px;
            font-weight: 800;
            letter-spacing: 1px;
            line-height: 65px;
            text-transform: uppercase;
        }

        #addParking .form-group {
            margin-bottom: 20px;
        }

        #addParking input[type='checkbox'] {
            accent-color: #ffde16;
        }

        #addParking .btn-primary {
            background-color: #ffde16;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #addParking .btn-primary:hover {
            background-color: #ffde16;
        }

        #addParking .mapboxgl-ctrl-geocoder {
            min-width: 100% !important;
        }



        #addParking .card {
            --background: #fff;
            --background-checkbox: #0082ff;
            --background-image: #fff, rgba(0, 107, 175, 0.2);
            --text-color: #666;
            --text-headline: #000;
            --card-shadow: #0082ff;
            --card-height: 190px;
            --card-width: 190px;
            --card-radius: 12px;
            --header-height: 47px;
            --blend-mode: overlay;
            --transition: 0.15s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #addParking .card:nth-child(odd) .card__body-cover-image {
            --x-y1: 100% 90%;
            --x-y2: 67% 83%;
            --x-y3: 33% 90%;
            --x-y4: 0% 85%;
        }

        #addParking .card:nth-child(even) .card__body-cover-image {
            --x-y1: 100% 85%;
            --x-y2: 73% 93%;
            --x-y3: 25% 85%;
            --x-y4: 0% 90%;
        }

        #addParking .card__input {
            position: absolute;
            display: block;
            outline: none;
            border: none;
            background: none;
            padding: 0;
            margin: 0;
            -webkit-appearance: none;
        }

        #addParking .card__input:checked~.card__body {
            --shadow: 0 0 0 3px var(--card-shadow);
        }

        #addParking .card__input:checked~.card__body .card__body-cover-checkbox {
            --check-bg: var(--background-checkbox);
            --check-border: #fff;
            --check-scale: 1;
            --check-opacity: 1;
        }

        #addParking .card__input:checked~.card__body .card__body-cover-checkbox--svg {
            --stroke-color: #fff;
            --stroke-dashoffset: 0;
        }

        #addParking .card__input:checked~.card__body .card__body-cover:after {
            --opacity-bg: 0;
        }

        #addParking .card__input:checked~.card__body .card__body-cover-image {
            --filter-bg: grayscale(0);
        }

        #addParking .card__input:disabled~.card__body {
            cursor: not-allowed;
            opacity: 0.5;
        }

        #addParking .card__input:disabled~.card__body:active {
            --scale: 1;
        }

        #addParking .card__body {
            display: grid;
            grid-auto-rows: calc(var(--card-height) - var(--header-height)) auto;
            background: var(--background);
            height: var(--card-height);
            width: var(--card-width);
            border-radius: var(--card-radius);
            overflow: hidden;
            position: relative;
            cursor: pointer;
            box-shadow: var(--shadow, 0 4px 4px 0 rgba(0, 0, 0, 0.02));
            -webkit-transition: box-shadow var(--transition), -webkit-transform var(--transition);
            transition: box-shadow var(--transition), -webkit-transform var(--transition);
            transition: transform var(--transition), box-shadow var(--transition);
            transition: transform var(--transition), box-shadow var(--transition), -webkit-transform var(--transition);
            -webkit-transform: scale(var(--scale, 1)) translateZ(0);
            transform: scale(var(--scale, 1)) translateZ(0);
        }

        #addParking .card__body:active {
            --scale: 0.96;
        }

        #addParking .card__body-cover {
            --c-border: var(--card-radius) var(--card-radius) 0 0;
            --c-width: 100%;
            --c-height: 100%;
            position: relative;
            overflow: hidden;
        }

        #addParking .card__body-cover:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: var(--c-width);
            height: var(--c-height);
            border-radius: var(--c-border);
            background: -webkit-gradient(linear, left top, right bottom, from(var(--background-image)));
            background: linear-gradient(to bottom right, var(--background-image));
            mix-blend-mode: var(--blend-mode);
            opacity: var(--opacity-bg, 1);
            -webkit-transition: opacity var(--transition) linear;
            transition: opacity var(--transition) linear;
        }

        #addParking .card__body-cover-image {
            width: var(--c-width);
            height: var(--c-height);
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: var(--c-border);
            -webkit-filter: var(--filter-bg, grayscale(1));
            filter: var(--filter-bg, grayscale(1));
            -webkit-clip-path: polygon(0% 0%, 100% 0%, var(--x-y1, 100% 90%), var(--x-y2, 67% 83%), var(--x-y3, 33% 90%), var(--x-y4, 0% 85%));
            clip-path: polygon(0% 0%, 100% 0%, var(--x-y1, 100% 90%), var(--x-y2, 67% 83%), var(--x-y3, 33% 90%), var(--x-y4, 0% 85%));
        }

        #addParking .card__body-cover-checkbox {
            background: var(--check-bg, var(--background-checkbox));
            border: 2px solid var(--check-border, #fff);
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 1;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            opacity: var(--check-opacity, 0);
            transition: transform var(--transition), opacity calc(var(--transition) * 1.2) linear, -webkit-transform var(--transition) ease;
            -webkit-transform: scale(var(--check-scale, 0));
            transform: scale(var(--check-scale, 0));
        }

        #addParking .card__body-cover-checkbox--svg {
            width: 13px;
            height: 11px;
            display: inline-block;
            vertical-align: top;
            fill: none;
            margin: 7px 0 0 5px;
            stroke: var(--stroke-color, #fff);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 16px;
            stroke-dashoffset: var(--stroke-dashoffset, 16px);
            -webkit-transition: stroke-dashoffset 0.4s ease var(--transition);
            transition: stroke-dashoffset 0.4s ease var(--transition);
        }

        #addParking .card__body-header {
            height: var(--header-height);
            background: var(--background);
            padding: 0 10px 10px 10px;
        }

        #addParking .card__body-header-title {
            color: var(--text-headline);
            font-weight: 700;
            margin-bottom: 8px;
        }

        #addParking .card__body-header-subtitle {
            color: var(--text-color);
            font-weight: 500;
            font-size: 13px;
        }


        #addParking .grid {
            display: grid;
            /* grid-template-columns: repeat(3, 1fr); */
            grid-gap: 1rem;
        }

        @media (min-width: 576px) {

            /* Small devices (576px and up) */
            #addParking .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 768px) {

            /* Medium devices (768px and up) */
            #addParking .grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media (min-width: 992px) {

            /* Large devices (992px and up) */
            #addParking .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1400px) {

            /* Extra large devices (1200px and up) */
            #addParking .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 1500px) {

            /* Extra large devices (1200px and up) */
            #addParking .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        #addParking .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        #addParking .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        #addParking .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        #addParking .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            font-size: 14px;
        }

        #addParking .upload__btn:hover {
            background-color: unset;
            color: #fff;
            background-color: #4045ba;
            border-color: #4045ba;
            transition: all 0.3s ease;
        }

        #addParking .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: transparent;
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        #addParking .upload__img-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        #addParking .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }






        #addParking .step-container {
            position: relative;
            text-align: center;
            transform: translateY(-43%);
        }

        #addParking .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
            color: black;
            border: 2px solid #ffde16;
            line-height: 30px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            cursor: pointer;
            /* Added cursor pointer */
        }

        #addParking .step-line {
            position: absolute;
            top: 16px;
            left: 50px;
            width: calc(100% - 100px);
            height: 2px;
            background-color: #ffde16;
            z-index: -1;
        }

        #addParking #multi-step-form {
            overflow-x: hidden;
        }

        #addParking .progress-bar {
            background-color: #ffde16;
        }
    </style>
    <header class="header">
        <div class="container-lg">
            <div class="row nav-design">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><img
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
                                    <a class="nav-link mx-2" aria-current="page" href="#home">Home</a>
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
            <div class="container-body bg-transparent" id="addParking">
                <h2 class="my-4 text-center text-white header-text">Add Your spaces</h2>

                <!-- Add Parking Slot Form -->
                <div class="mb-0 pb-0 bg-transparent shadow-none text-white" id="addParkingForm">


                    <div id="container" class="container mt-5">
                        <div class="progress px-1" style="height: 3px;">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="step-container d-flex justify-content-between">
                            <div class="step-circle" onclick="displayStep(1)">1</div>
                            <div class="step-circle" onclick="displayStep(2)">2</div>
                            <div class="step-circle" onclick="displayStep(3)">3</div>
                            <div class="step-circle" onclick="displayStep(4)">4</div>
                        </div>

                        <form id="multi-step-form" method="POST" action="dfsd">
                            <div class="step step-1">
                                <!-- Step 1 form fields here -->
                                <h3>Area Information</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="location">Name:</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6" id="customGeocoder">
                                        <label for="location">Location or Cordinates:</label>
                                        {{-- <input type="text" class="form-control" id="geocoder" required> --}}
                                        <div id="geocoder" class="w-100 position-relative z-2">
                                            <button type="button"
                                                class="overlay-txt position-absolute z-3 text-body-secondary bg-transparent border-0"
                                                style="top: 20%; right: 3%; font-size: 12px;" onclick="showMap()">Set
                                                Location
                                                on
                                                Map</button>
                                        </div>
                                    </div>
                                    <div class="form-group d-none" id="map-box">
                                        <div id="map" style="height: 500px"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary next-step ">Next</button>
                            </div>

                            <div class="step step-2">
                                <!-- Step 2 form fields here -->
                                <h3>Prking Information</h3>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Price:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control">
                                            <div class="input-group-text">৳</div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="slotNumber">Slot Numbers: <small
                                                style="color: rgb(177, 177, 177);">Separeted by
                                                comma(,)</small></label>
                                        <input type="text" class="form-control" id="slotNumber">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Opening Time:</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" value="05:00">
                                        </div>
                                        <div class="upload__img-wrap"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Closing Time:</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" value="00:00">
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>

                            <div class="step step-3">
                                <!-- Step 3 form fields here -->
                                <h3>Images and Types</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-4">Vehicle Type:</label>
                                        <input class="card__input" type="checkbox">
                                        <div class="grid">
                                            <label class="card">
                                                <input class="card__input" type="checkbox">
                                                <div class="card__body">
                                                    <div class="card__body-cover"><img class="card__body-cover-image"
                                                            src="{{ asset('frontend/assets/img/car.png') }}"><span
                                                            class="card__body-cover-checkbox">
                                                            <svg class="card__body-cover-checkbox--svg"
                                                                viewBox="0 0 12 10">
                                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                            </svg></span></div>
                                                    <header class="card__body-header">
                                                        <h2 class="card__body-header-title">Car</h2>
                                                    </header>
                                                </div>
                                            </label>
                                            <label class="card">
                                                <input class="card__input" type="checkbox">
                                                <div class="card__body">
                                                    <div class="card__body-cover"><img class="card__body-cover-image"
                                                            src="{{ asset('frontend/assets/img/bike.jpg') }}"><span
                                                            class="card__body-cover-checkbox">
                                                            <svg class="card__body-cover-checkbox--svg"
                                                                viewBox="0 0 12 10">
                                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                            </svg></span></div>
                                                    <header class="card__body-header">
                                                        <h2 class="card__body-header-title">Bike</h2>
                                                    </header>
                                                </div>
                                            </label>
                                            <label class="card">
                                                <input class="card__input" type="checkbox">
                                                <div class="card__body">
                                                    <div class="card__body-cover"><img class="card__body-cover-image"
                                                            src="{{ asset('frontend/assets/img/truck.jpg') }}"><span
                                                            class="card__body-cover-checkbox">
                                                            <svg class="card__body-cover-checkbox--svg"
                                                                viewBox="0 0 12 10">
                                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                            </svg></span></div>
                                                    <header class="card__body-header">
                                                        <h2 class="card__body-header-title">Truck</h2>
                                                    </header>
                                                </div>
                                            </label>
                                            <label class="card">
                                                <input class="card__input" type="checkbox">
                                                <div class="card__body">
                                                    <div class="card__body-cover"><img class="card__body-cover-image"
                                                            src="{{ asset('frontend/assets/img/bus.jpg') }}"><span
                                                            class="card__body-cover-checkbox">
                                                            <svg class="card__body-cover-checkbox--svg"
                                                                viewBox="0 0 12 10">
                                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                            </svg></span></div>
                                                    <header class="card__body-header">
                                                        <h2 class="card__body-header-title">Bus</h2>
                                                    </header>
                                                </div>
                                            </label>
                                            <label class="card">
                                                <input class="card__input" type="checkbox">
                                                <div class="card__body">
                                                    <div class="card__body-cover"><img class="card__body-cover-image"
                                                            src="{{ asset('frontend/assets/img/cng.png') }}"><span
                                                            class="card__body-cover-checkbox">
                                                            <svg class="card__body-cover-checkbox--svg"
                                                                viewBox="0 0 12 10">
                                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                            </svg></span></div>
                                                    <header class="card__body-header">
                                                        <h2 class="card__body-header-title">CNG</h2>
                                                    </header>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="upload__box">
                                            <div class="upload__btn-box text-center">
                                                <label class="upload__btn">
                                                    <p class="mb-0">Upload images</p>
                                                    <input type="file" multiple="" data-max_length="20"
                                                        class="upload__inputfile">
                                                </label>
                                            </div>
                                            <div class="upload__img-wrap mt-3"></div>
                                        </div>

                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>
                            <div class="step step-4">
                                <!-- Step 3 form fields here -->
                                <h3>Features</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> CCTV</label><br>
                                        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> Security</label><br>
                                        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> Guest Room</label><br>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1"> Fire Extinguisher</label><br>
                                        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> Unlimited Water Supply</label><br>
                                        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                        <label for="vehicle2"> Located beside main road</label><br>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                        <pre id="result"></pre>
                        <pre id="coordinates" class="coordinates"></pre>
                    </div>

                </div>
            </div>


        </div>
    </header>
    <script src="{{ asset('frontend') }}/assets/js/jquery-3.1.1.min.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            countries: 'bd',
        });

        geocoder.addTo('#geocoder');

        const results = document.getElementById('result');

        geocoder.on('result', (e) => {
            results.innerText = JSON.stringify(e.result, null, 2);
        });

        geocoder.on('clear', () => {
            results.innerText = '';
        });

        const coordinates = document.getElementById('coordinates');

        function showMap() {
            console.log('show map')
            document.querySelector('#map-box').classList.remove('d-none');
            document.querySelector('#map-box').classList.add('d-block');

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [90.3637, 23.8070],
                zoom: 13
            });

            const marker = new mapboxgl.Marker({
                    draggable: true
                })
                .setLngLat([90.3637, 23.8070])
                .addTo(map);

            function onDragEnd() {
                const lngLat = marker.getLngLat();
                coordinates.style.display = 'block';
                coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
                document.querySelector('.mapboxgl-ctrl-geocoder--input').value = '[' + lngLat.lng + ', ' + lngLat.lat + ']';
            }

            marker.on('dragend', onDragEnd);
        }


        var geocoderInput = document.querySelector('.mapboxgl-ctrl-geocoder--input');

        // Check if the element is found
        if (geocoderInput) {
            // Add the name attribute to the input field
            geocoderInput.name = 'locationSearch';
        } else {
            console.error('Element with id "geocoderInput" not found.');
        }
    </script>
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $(".upload__inputfile").each(function() {
                $(this).on("change", function(e) {
                    imgWrap = $(this).closest(".upload__box").find(".upload__img-wrap");
                    var maxLength = $(this).attr("data-max_length");

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {
                        if (!f.type.match("image.*")) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false;
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result +
                                        ")' data-number='" +
                                        $(".upload__img-close").length +
                                        "' data-file='" +
                                        f.name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                };
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $("body").on("click", ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
    <script>
        var currentStep = 1;
        var updateProgressBar;

        function displayStep(stepNumber) {
            if (stepNumber >= 1 && stepNumber <= 4) {
                $(".step-" + currentStep).hide();
                $(".step-" + stepNumber).show();
                currentStep = stepNumber;
                updateProgressBar();
            }
        }

        $(document).ready(function() {
            $("#multi-step-form").find(".step").slice(1).hide();

            $(".next-step").click(function() {
                if (currentStep < 4) {
                    $(".step-" + currentStep).addClass(
                        "animate__animated animate__fadeOutLeft"
                    );
                    currentStep++;
                    setTimeout(function() {
                        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                        $(".step-" + currentStep)
                            .show()
                            .addClass("animate__animated animate__fadeInRight");
                        updateProgressBar();
                    }, 500);
                }
            });

            $(".prev-step").click(function() {
                if (currentStep > 1) {
                    $(".step-" + currentStep).addClass(
                        "animate__animated animate__fadeOutRight"
                    );
                    currentStep--;
                    setTimeout(function() {
                        $(".step")
                            .removeClass("animate__animated animate__fadeOutRight")
                            .hide();
                        $(".step-" + currentStep)
                            .show()
                            .addClass("animate__animated animate__fadeInLeft");
                        updateProgressBar();
                    }, 500);
                }
            });

            updateProgressBar = function() {
                var progressPercentage = ((currentStep - 1) / 2) * 100;
                $(".progress-bar").css("width", progressPercentage + "%");
            };
        });
    </script>
@endsection
