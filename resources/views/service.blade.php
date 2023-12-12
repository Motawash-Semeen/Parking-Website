@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        #map {
            /* position: absolute;
                                    top: 0;
                                    bottom: 0; */
            width: 100vw;
            height: 100vh;
        }

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
    </style>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
    <div id="map"></div>

    <div id="geocoder" class="geocoder"></div>

    {{-- <div id="custom-geolocate" class="custom-geolocate">
        <!-- Add your custom geolocate button content here -->
        <span>&#x1F4CD;</span> <!-- This is just an example, you can replace it with your own content -->
    </div> --}}

    <script>
        //////////////////////////////////////////////////////////////////*css*/
        //////////////////////////////////Main Mapbx integration with center and zoom/////////////////////////////////////////

        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';
        const map = new mapboxgl.Map({
            container: 'map',
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [90.3637, 23.8070],
            zoom: 15
        });
        //////////////////////////////////////////////////////////////////*css*/
        //////////////////////////////////Restrict a area/////////////////////////////////////////

        // Add the control to the map.
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            bbox: [88.18, 20.75, 92.67, 26.64], // Bounding box for Bangladesh
            mapboxgl: mapboxgl
        });


        // const customGeolocate = document.getElementById('custom-geolocate');
        const geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        });

        // customGeolocate.addEventListener('click', () => {
        //     geolocate.trigger();
        // });

        map.addControl(geolocate);
        map.addControl(new mapboxgl.NavigationControl());


        //////////////////////////////////////////////////////////////////*css*/
        //////////////////////////////////Add space marker/////////////////////////////////////////

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
                                'description': '<b><p>Book Now</p></b><p style="text-align: center;">120tk/hr</p><button style="margin: auto;">Select</button>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.30, 23.81]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong><h5>Book Now</h5></strong><p>180tk/hr</p><button>Select</button>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.35, 23.81]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong><h5>Book Now</h5></strong><p>100tk/hr</p><button>Select</button>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.358, 23.8090]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong><h5>Book Now</h5></strong><p>80tk/hr</p><button>Select</button>',
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [90.3600, 23.80]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong><h5>Book Now</h5></strong><p>150tk/hr</p><button>Select</button>',
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
                    'circle-color': '#4264fb',
                    'circle-radius': 6,
                    'circle-stroke-width': 2,
                    'circle-stroke-color': '#ffffff'
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
    </script>
@endsection
