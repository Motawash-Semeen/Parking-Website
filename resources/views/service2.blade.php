@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')


    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">

    <style>
        #geocoder {
            z-index: 1;
            margin: 20px;
        }

        .mapboxgl-ctrl-geocoder {
            min-width: 100%;
        }

    </style>

    <div id="geocoder"></div>
    <pre id="result"></pre>


    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoidG9ubW95eiIsImEiOiJjbG93bnozdGUweW5uMmlxMGxqMGRzdWN0In0.jaSCOUFd35sJJdAQ4uSgFQ';
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
        });

        geocoder.addTo('#geocoder');

        // Get the geocoder results container.
        const results = document.getElementById('result');

        // Add geocoder result to container.
        geocoder.on('result', (e) => {
            //results.innerText = JSON.stringify(e.result.place_name, null, 2);

            const areaName = e.result.place_name;
            results.innerText = JSON.stringify(areaName, null, 2);

            // Redirect to the next page with the area name as a parameter
            window.location.href = 'result?area=' + encodeURIComponent(areaName);
        });

 
        // Clear results container when search is cleared.
        geocoder.on('clear', () => {
            results.innerText = '';
        });
    </script>
@endsection
