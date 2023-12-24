@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')
    <style>
        .badge-danger {
            background-color: #dc3545;
            border-radius: 5px;
        }

        .badge-primary {
            background-color: #ffde16;
            border-radius: 5px;
        }

        a {
            text-decoration: none;

        }

        td {
            color: #69707a !important;
        }
    </style>
    <script src="https://kit.fontawesome.com/4a3cf85510.js" crossorigin="anonymous"></script>

    <div class="container px-4 mt-5" id="profile">
        
        <div class="tab-content my-4" id="nav-tabContent">

            <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-lg-8">
                      Edit Information
                    </div>
                    <div class="col-lg-4 text-end">
                      <a href="{{ url('dashboard') }}" class="btn btn-primary float-right">Back</a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                    <div id="upslot" class="container mt-4">


                        <form id="multi-step-form" method="POST" action="{{ url('user/edit-slot/' . $slot->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="step step-1 mb-5">
                                <!-- Step 1 form fields here -->
                                <h3>Area Information</h3>
                                <div class="row">
                                  <input type="text" id="coordinates" value="{{ $slot->coordinates }}" hidden>
                                    <div class="form-group col-md-3">
                                        <label for="location">Building Name</label>
                                        <input type="text" class="form-control" name="building_name"
                                            placeholder="Apon House" value="{{ $slot->building_name }}">
                                        @error('building_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="location">Building Number</label>
                                        <input type="text" class="form-control" name="building_number"
                                            placeholder="123/1" value="{{ $slot->building_number }}">
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
                                            placeholder="01xxxxxxxxx" max="01999999999" value="{{ $slot->mobile }}">
                                        @error('number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" class="form-control" id="inputCity" name="city"
                                            placeholder="Mirpur" value="{{ $slot->city }}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip" class="form-label">Post Area</label>
                                        <input type="text" class="form-control" id="inputZip" name="post_area"
                                            placeholder="Kafrul" value="{{ $slot->post_area }}">
                                        @error('post_area')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip" class="form-label">Zip</label>
                                        <input type="number" class="form-control" id="inputZip" name="zip"
                                            placeholder="1234" value="{{ $slot->zip }}">
                                        @error('zip')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="step step-2 mb-5">
                                <!-- Step 2 form fields here -->
                                <h3>Prking Information</h3>
                                <div class="row">
                                    <div class="form-group col-sm-6 pe-0">
                                        <label>Price per hour</label>
                                        <div class="input-group row">
                                            <div class="col-md-11 pe-0">
                                                <input type="number" class="form-control" name="price"
                                                    placeholder="123" value="{{ $slot->price }}">
                                            </div>
                                            <div class="col-md-1 p-0">
                                                <div class="input-group-text h-100">৳</div>
                                            </div>


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
                                            placeholder="D1,D2,G1,G2,G3" value="{{ $slot->slot_numbers }}">
                                        @error('slot_numbers')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Opening Time</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="open_time"
                                                value="{{ $slot->open_time }}">
                                            @error('open_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Closing Time</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" value="00:00" name="close_time"
                                                value="{{ $slot->close_time }}">
                                            @error('close_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="step step-3 mb-5">
                                <!-- Step 3 form fields here -->
                                @php
                                    $selectedValues = explode(',', $slot->slot_type);
                                @endphp
                                <h3>Images and Types</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-4">Vehicle Type</label>
                                        {{-- <input class="card__input" type="checkbox" name="type"> --}}

                                        <div class="grid">
                                            <label class="card">
                                                <input class="card__input" type="checkbox" name="type[]"
                                                    value="car" {{ in_array('car', $selectedValues) ? 'checked' : '' }}>
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
                                                    value="bike" {{ in_array('bike', $selectedValues) ? 'checked' : '' }}>
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
                                                    value="truck" {{ in_array('truck', $selectedValues) ? 'checked' : '' }}>
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
                                                    value="bus" {{ in_array('bus', $selectedValues) ? 'checked' : '' }}>
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
                                                    value="cng" {{ in_array('cng', $selectedValues) ? 'checked' : '' }}>
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
                                      <label class="mb-4">Preview image<small
                                              style="font-size: 10px; color:rgba(255, 255, 255, 0.493)"> (max 5
                                              image, and 2mb)</small></label>
                                      <div class="upload__box">
                                          <div class="upload__btn-box text-center">
                                              <label class="upload__btn">
                                                  <p class="mb-0">Upload images</p>
                                                  <input type="file" multiple="" class="upload__inputfile"
                                                      name="images[]">
                                                  @error('images')
                                                      <div class="text-danger">{{ $message }}</div>
                                                  @enderror
                                              </label>
                                          </div>
                                          <div class="upload__img-wrap mt-3">
                                            @php
                                              $i=0;
                                            @endphp
                                            @foreach ($slot->multimg as $img)
                                            <div class="upload__img-box"><div style="background-image: url('{{ asset('frontend/assets/img/previewSlot/'.$img->image) }}')" data-number="{{ $i++ }}" data-file="{{ $img->image }}" class="img-bg"><a href="{{ url('user/slot/delete-img/'.$slot->id.'/'.$img->id) }}" class="upload__img-close"></a></div></div>
                                            @endforeach
                                            
                                          </div>
                                      </div>

                                  </div>
                                </div>
                            </div>
                            <div class="step step-4 mt-4">
                              <!-- Step 3 form fields here -->
                              <h3>Features</h3>
                              <div class="row">
                                  <div class="form-group col-md-6">
                                      <input type="checkbox" id="vehicle1" name="cctv" value="1"
                                          {{ $slot->cctv == 1 ? 'checked' : '' }}>
                                      <label for="vehicle1"> CCTV</label><br>
                                      <input type="checkbox" id="vehicle2" name="security" value="1"
                                          {{ $slot->security == 1 ? 'checked' : '' }}>
                                      <label for="vehicle2"> Security</label><br>
                                      <input type="checkbox" id="vehicle2" name="guest" value="1"
                                          {{ $slot->guest == 1 ? 'checked' : '' }}>
                                      <label for="vehicle2"> Guest Room</label><br>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <input type="checkbox" id="vehicle1" name="extinguisher" value="1"
                                          {{ $slot->extinguisher == 1 ? 'checked' : '' }}>
                                      <label for="vehicle1"> Fire Extinguisher</label><br>
                                      <input type="checkbox" id="vehicle2" name="water" value="1"
                                          {{ $slot->water == 1 ? 'checked' : '' }}>
                                      <label for="vehicle2"> Unlimited Water Supply</label><br>
                                      <input type="checkbox" id="vehicle2" name="mainroad" value="1"
                                          {{ $slot->mainroad == 1 ? 'checked' : '' }}>
                                      <label for="vehicle2"> Located beside main road</label><br>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('frontend') }}/assets/js/jquery-3.1.1.min.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';
        const coordinates = document.getElementById('coordinates').value;
        const coordinateValue = JSON.parse(coordinates).map(coord => parseFloat(coord));

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
            console.log(coordinates);
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [90.3637, 23.8070],
                zoom: 13
            });

            const marker = new mapboxgl.Marker({
                    draggable: true
                })
                .setLngLat(new mapboxgl.LngLat(coordinateValue[0], coordinateValue[1]))
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
            geocoderInput.value = @php
                echo json_encode($slot->coordinates);
            @endphp;
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
@endsection
