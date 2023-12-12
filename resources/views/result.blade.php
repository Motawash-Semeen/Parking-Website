@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')


    <style>

        .geocoder {
            position: absolute;
            z-index: 1;
            width: 50%;
            left: 20px;
            top: 10rem;
        }

        .mapboxgl-ctrl-geocoder {
            min-width: 100%;
        }

        .mapboxgl-popup {
            max-width: 400px;
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        }

        #map {
            height: 100vh;
        }

        #custom-geolocate {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }

        #custom-geolocate:hover {
            background-color: #2980b9;
        }

        .offcanvas {
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: auto;
            width: 300px;
            /* Adjust the width as needed */
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        .offcanvas.show {
            transform: translateX(0);
        }
    </style>


    <div id="map"></div>
    <div id="geocoder" class="geocoder"></div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Area Name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
            <div class="text-center">
                <p style="font-size: 24px; margin-bottom: 0px"><strong>120tk/hr</strong></p>
                <p style="font-size: 16px">24 slots</p>
            </div>
            <p><i class="bi bi-geo"></i> <strong style="color: #999999">Specify Location</strong></p>
            <p><i class="bi bi-telephone"></i> <strong style="color: #999999">Specify Location</strong></p>
            <hr>
            <div class="features">
                <p><strong>Features</strong></p>
                <p style="color: #999999"><i class="bi bi-geo-alt"></i> Specify Location</p>
                <p style="color: #999999"><i class="bi bi-telephone"></i> Specify Location</p>
                <p style="color: #999999"><i class="bi bi-clock"></i> Specify Location</p>
                <p style="color: #999999"><i class="bi bi-people"></i> Specify Location</p>
                <p style="color: #999999"><i class="bi bi-credit-card"></i> Specify Location</p>
            </div>
            <hr>
            <div class="text-center mt-3">
                <button class="btn btn-primary" type="button">Show More Details</button>
                <button class="btn btn-primary" type="button" onclick="toggleDateTimeFields()">Book</button>
            </div>
            <hr>
            <div id="dateTimeFields" style="display: none; margin-top: 20px;">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <label for="arriveDateTime" class="form-label">Arrive Date and Time:</label>
                        <input type="datetime-local" class="form-control" id="arriveDateTime" name="arriveDateTime">
                    </div>
                    <div class="col-md-6">
                        <label for="leavingDateTime" class="form-label">Leaving Date and Time:</label>
                        <input type="datetime-local" class="form-control" id="leavingDateTime" name="leavingDateTime">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="button" id="payments">Proceed To payment</button>
                </div>
                <hr>
            </div>

            <div class="features">
                <p><strong>Review</strong></p>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>

            </div>
            <hr>
            <div class="payments d-flex justify-content-between align-items-center">
                <p><strong>Payment Options</strong></p>
                <div class="payment-main d-flex">
                    <div class="payment-container d-flex p-2 flex-column align-items-center">
                        <i class="bi bi-credit-card-2-back" style="font-size: 24px"></i>
                        <p>Cards</p>
                    </div>
                    <div class="payment-container d-flex p-2 flex-column align-items-center">
                        <i class="bi bi-cash-stack" style="font-size: 24px"></i>
                        <p>Cash</p>
                    </div>
                    <div class="payment-container d-flex p-2 flex-column align-items-center">
                        <i class="bi bi-phone" style="font-size: 24px"></i>
                        <p>Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';

        // Create the map with default settings
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [90.3637, 23.8070],
            zoom: 15
        });

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });

        //document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

        map.dragRotate.disable();
        map.touchZoomRotate.disableRotation();

        // Keep a reference to the marker so you can remove it later
        let marker;

        const geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        });

        map.addControl(geolocate);
        map.addControl(new mapboxgl.NavigationControl());

        map.on('load', () => {
            map.addSource('places', {
                // This GeoJSON contains features that include an "icon"
                // property. The value of the "icon" property corresponds
                // to an image in the Mapbox Streets style's sprite.
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [{
                            'type': 'Feature',
                            'properties': {
                                'description': '<div><b><p>Book Now</p></b><p style="text-align: center;">120tk/hr</p><div style="margin: auto; text-align: center;"><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="border: none;">Select</button></div></div>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.30, 23.81]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<div><b><p>Book Now</p></b><p style="text-align: center;">80tk/hr</p><div style="margin: auto; text-align: center;"><button style="border: none;">Select</button></div></div>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.35, 23.81]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<div><b><p>Book Now</p></b><p style="text-align: center;">100tk/hr</p><div style="margin: auto; text-align: center;"><button style="border: none;">Select</button></div></div>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.358, 23.8090]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<div><b><p>Book Now</p></b><p style="text-align: center;">170tk/hr</p><div style="margin: auto; text-align: center;"><button style="border: none;">Select</button></div></div>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.3600, 23.80]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<div><b><p>Book Now</p></b><p style="text-align: center;">150tk/hr</p><div style="margin: auto; text-align: center;"><button style="border: none;">Select</button></div></div>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.359, 23.8020]
                            }
                        },

                    ]
                }
            });
            // Add a layer showing the places.
            map.addLayer({
                'id': 'places',
                'type': 'circle',
                'source': 'places',
                'paint': {
                    'circle-color': '#ffde16',
                    'circle-radius': 6,
                    'circle-stroke-width': 2,
                    'circle-stroke-color': '#000000'
                }
            });

            // When a click event occurs on a feature in the places layer, open a popup at the
            // location of the feature, with description HTML from its properties.
            map.on('click', 'places', (e) => {
                // Copy coordinates array.
                const coordinates = e.features[0].geometry.coordinates.slice();
                const description = e.features[0].properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .addTo(map);
            });

            // Change the cursor to a pointer when the mouse is over the places layer.
            map.on('mouseenter', 'places', () => {
                map.getCanvas().style.cursor = 'pointer';
            });

            // Change it back to a pointer when it leaves.
            map.on('mouseleave', 'places', () => {
                map.getCanvas().style.cursor = '';
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

        // Function to add a marker at a specific location
        function addMarker(coordinates) {
            // Remove the existing marker if it exists
            if (marker) {
                marker.remove();
            }

            // Add a new marker at the specified coordinates
            marker = new mapboxgl.Marker().setLngLat(coordinates).addTo(map);
            console.log(coordinates);
        }

        // Retrieve the area name from the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const areaName = urlParams.get('area');
        const coordinatesParam = urlParams.get('coordinates');
        // Function to add a marker at a specific location
        function addMarker(coordinates) {
            // Remove the existing marker if it exists
            if (marker) {
                marker.remove();
            }

            // Add a new marker at the specified coordinates
            marker = new mapboxgl.Marker().setLngLat(coordinates).addTo(map);
        }
        if (coordinatesParam) {
            const coordinates = coordinatesParam.split(',').map(Number);

            // Set the map center and add a marker
            map.setCenter(coordinates);
            addMarker(coordinates);
        }
        // Check if areaName is present before proceeding
        else if (areaName) {
            const mapboxClient = mapboxSdk({
                accessToken: mapboxgl.accessToken
            });

            mapboxClient.geocoding
                .forwardGeocode({
                    query: areaName,
                    autocomplete: false,
                    limit: 1
                })
                .send()
                .then((response) => {
                    if (
                        response &&
                        response.body &&
                        response.body.features &&
                        response.body.features.length
                    ) {
                        const feature = response.body.features[0];

                        // Set the map center and add a marker
                        map.setCenter(feature.center);
                        addMarker(feature.center);
                    } else {
                        console.error('Invalid response:');
                        console.error(response);
                    }
                })
                .catch((error) => {
                    console.error('Error during geocoding:');
                    console.error(error);
                });
        }

        // Listen for the geocoder result event
        geocoder.on('result', (e) => {
            const coordinates = e.result.center;

            // Update the map center and add a marker
            map.setCenter(coordinates);
            addMarker(coordinates);
        });

        function toggleDateTimeFields() {
            const dateTimeFields = document.getElementById('dateTimeFields');

            // Toggle visibility
            if (dateTimeFields.style.display === 'none') {
                dateTimeFields.style.display = 'block';
            } else {
                dateTimeFields.style.display = 'none';
            }
        }
    </script>
@endsection
