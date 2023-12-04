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
    </style>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
    <div id="map"></div>

    <div id="geocoder" class="geocoder"></div>

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

        // Add geolocate control to the map.
        map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                // When active the map will receive updates to the device's location as it changes.
                trackUserLocation: true,
                // Draw an arrow next to the location dot to indicate which direction the device is heading.
                showUserHeading: true
            })
        );

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
                                'description': '<strong>Make it Mount Pleasant</strong><p><a href="http://www.mtpleasantdc.com/makeitmtpleasant" target="_blank" title="Opens in a new window">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>',
                                'icon': 'theatre'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.038659, 38.931567]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong>Mad Men Season Five Finale Watch Party</strong><p>Head to Lounge 201 (201 Massachusetts Avenue NE) Sunday for a <a href="http://madmens5finale.eventbrite.com/" target="_blank" title="Opens in a new window">Mad Men Season Five Finale Watch Party</a>, complete with 60s costume contest, Mad Men trivia, and retro food and drink. 8:00-11:00 p.m. $10 general admission, $20 admission and two hour open bar.</p>',
                                'icon': 'theatre'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.003168, 38.894651]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong>Big Backyard Beach Bash and Wine Fest</strong><p>EatBar (2761 Washington Boulevard Arlington VA) is throwing a <a href="http://tallulaeatbar.ticketleap.com/2012beachblanket/" target="_blank" title="Opens in a new window">Big Backyard Beach Bash and Wine Fest</a> on Saturday, serving up conch fritters, fish tacos and crab sliders, and Red Apron hot dogs. 12:00-3:00 p.m. $25.grill hot dogs.</p>',
                                'icon': 'bar'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.090372, 38.881189]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong>Ballston Arts & Crafts Market</strong><p>The <a href="http://ballstonarts-craftsmarket.blogspot.com/" target="_blank" title="Opens in a new window">Ballston Arts & Crafts Market</a> sets up shop next to the Ballston metro this Saturday for the first of five dates this summer. Nearly 35 artists and crafters will be on hand selling their wares. 10:00-4:00 p.m.</p>',
                                'icon': 'art-gallery'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.111561, 38.882342]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description': '<strong>Seersucker Bike Ride and Social</strong><p>Feeling dandy? Get fancy, grab your bike, and take part in this year\'s <a href="http://dandiesandquaintrelles.com/2012/04/the-seersucker-social-is-set-for-june-9th-save-the-date-and-start-planning-your-look/" target="_blank" title="Opens in a new window">Seersucker Social</a> bike ride from Dandies and Quaintrelles. After the ride enjoy a lawn party at Hillwood with jazz, cocktails, paper hat-making, and more. 11:00-7:00 p.m.</p>',
                                'icon': 'bicycle'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.052477, 38.943951]
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
