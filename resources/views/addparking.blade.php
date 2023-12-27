@extends('master')
@section('frontend.content')
    <header class="header">
        <div class="container-lg">
            <div class="row nav-design">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/') }}"><img
                                src="{{ asset('frontend') }}/assets/landowner/img/logo.png" alt="Logo" height="60"></a>
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
                                    <a class="nav-link mx-2" href="{{ url('/#about') }}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="{{ url('/#contact') }}">Conatct & Help</a>
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
                                        <a class="nav-link text-dark h5 btn-nav"
                                            href="{{ url('register') }}">Signup</i></a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="container-body bg-transparent" id="addParking">
                <h2 class="my-4 text-center text-white header-text">Add Your <span style="color: #ffde16;">spaces</span></h2>

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

                        <form id="multi-step-form" method="POST" action="{{ url('/addParking') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="step step-1">
                                <!-- Step 1 form fields here -->
                                <h3>Area Information</h3>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="location">Building Name</label>
                                        <input type="text" class="form-control" name="building_name"
                                            placeholder="Apon House">
                                        @error('building_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="location">Building Number</label>
                                        <input type="text" class="form-control" name="building_number"
                                            placeholder="123/1">
                                        @error('building_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" id="customGeocoder">
                                        <label for="location">Location or Cordinates</label>
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
                                    <div class="form-group col-md-3">
                                        <label for="inputCity" class="form-label">Mobile</label>
                                        <input type="number" class="form-control" id="inputCity" name="number"
                                            placeholder="01xxxxxxxxx" max="01999999999">
                                        @error('number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" class="form-control" id="inputCity" name="city"
                                            placeholder="Mirpur">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip" class="form-label">Post Area</label>
                                        <input type="text" class="form-control" id="inputZip" name="post_area"
                                            placeholder="Kafrul">
                                        @error('post_area')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip" class="form-label">Zip</label>
                                        <input type="number" class="form-control" id="inputZip" name="zip"
                                            placeholder="1234">
                                        @error('zip')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary next-step ">Next</button>
                            </div>

                            <div class="step step-2">
                                <!-- Step 2 form fields here -->
                                <h3>Prking Information</h3>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Price per hour</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" placeholder="123">
                                            <div class="input-group-text">৳</div>
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="slotNumber">Slot Numbers <small
                                            style="font-size: 10px; color:rgba(255, 255, 255, 0.493)">Separeted by
                                                comma(,)</small></label>
                                        <input type="text" class="form-control" id="slotNumber" name="slot_numbers"
                                            placeholder="D1,D2,G1,G2,G3">
                                        @error('slot_numbers')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Opening Time</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" value="05:00" name="open_time">
                                            @error('open_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Closing Time</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" value="00:00" name="close_time">
                                            @error('close_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                        <label class="mb-4">Vehicle Type</label>
                                        {{-- <input class="card__input" type="checkbox" name="type"> --}}

                                        <div class="grid">
                                            <label class="card">
                                                <input class="card__input" type="checkbox" name="type[]"
                                                    value="car">
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
                                                <input class="card__input" type="checkbox" name="type[]"
                                                    value="bike">
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
                                                <input class="card__input" type="checkbox" name="type[]"
                                                    value="truck">
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
                                                <input class="card__input" type="checkbox" name="type[]"
                                                    value="bus">
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
                                                <input class="card__input" type="checkbox" name="type[]"
                                                    value="cng">
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
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="mb-4">Preview image<small style="font-size: 10px; color:rgba(255, 255, 255, 0.493)"> (max 5 image, and 2mb)</small></label>
                                        <div class="upload__box">
                                            <div class="upload__btn-box text-center">
                                                <label class="upload__btn">
                                                    <p class="mb-0">Upload images</p>
                                                    <input type="file" multiple=""
                                                        class="upload__inputfile" name="images[]">
                                                    @error('images')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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
                                        <input type="checkbox" id="vehicle1" name="cctv" value="1">
                                        <label for="vehicle1"> CCTV</label><br>
                                        <input type="checkbox" id="vehicle2" name="security" value="1">
                                        <label for="vehicle2"> Security</label><br>
                                        <input type="checkbox" id="vehicle2" name="guest" value="1">
                                        <label for="vehicle2"> Guest Room</label><br>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="checkbox" id="vehicle1" name="extinguisher" value="1">
                                        <label for="vehicle1"> Fire Extinguisher</label><br>
                                        <input type="checkbox" id="vehicle2" name="water" value="1">
                                        <label for="vehicle2"> Unlimited Water Supply</label><br>
                                        <input type="checkbox" id="vehicle2" name="mainroad" value="1">
                                        <label for="vehicle2"> Located beside main road</label><br>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary prev-step">Previous</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
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
        geocoder.on('result', (e) => {
            const coordinates = e.result.center[0];
            var geocoderInput = document.querySelector('.mapboxgl-ctrl-geocoder--input');
            // Log the coordinates to the console.
            console.log('Coordinates:', coordinates);

            geocoderInput.value = '[' + e.result.center[0] + ', ' + e.result.center[1] + ']';
        });

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
