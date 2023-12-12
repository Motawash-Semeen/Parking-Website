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
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css"
        type="text/css">
    <div id="map"></div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';
        // Create the map with default settings
        if (!mapboxgl) {
            console.error('Mapbox GL JS is not loaded!');
        }

        // Create the map with default settings
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [90.30, 23.81], // Replace with your start coordinates
            zoom: 12
        });

        map.on('load', () => {
            if (typeof MapboxDirections === 'undefined') {
                console.error('Mapbox Directions plugin is not loaded!');
            } else {
                // Add navigation control
                map.addControl(new mapboxgl.NavigationControl());

                // Add directions control
                const directions = new MapboxDirections({
                    accessToken: mapboxgl.accessToken
                });

                map.addControl(directions, 'top-left');

                // Set the end coordinates for directions
                const endCoordinates = [90.374565, 23.805381]; // Replace with your end coordinates
                directions.setDestination(endCoordinates);
                directions.setOrigin([90.30, 23.81]);
            }
        });
    </script>
@endsection
