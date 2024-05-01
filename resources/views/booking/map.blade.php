@extends('layouts.app')
@section('content')
    <style>
        /* Set the size of the map */
        #map {
            height: 500px;
            width: 100%;
        }

        #info {
            margin-top: 10px;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div id="map"></div>
                <div id="info"></div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
    <script async src="https://www.googleapis.com/geolocation/v1/geolocate?key={{ env('GOOGLE_MAP_KEY') }}"></script>

    <script>
        var userMarker;

        function initMap() {

            // Location Set
            var pointA = new google.maps.LatLng({{ $pickupLocation['lat'] }}, {{ $pickupLocation['lng'] }}),
                pointB = new google.maps.LatLng({{ $dropoffLocation['lat'] }}, {{ $dropoffLocation['lng'] }}),
                myOptions = {
                    zoom: 7,
                    center: pointA
                },

                // Initialize map
                map = new google.maps.Map(document.getElementById('map'), myOptions),

                // Enable traffic layer
                trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);

            // Enable the "My Location" button control
            var myLocationControlDiv = document.createElement('div');
            var myLocationControl = new MyLocationControl(myLocationControlDiv, map);

            myLocationControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(myLocationControlDiv);


            directionsService = new google.maps.DirectionsService,
                directionsDisplay = new google.maps.DirectionsRenderer({
                    map: map,
                }),

                // Add markers for pickup and drop-off locations
                markerA = new google.maps.Marker({
                    position: pointA,
                    title: "Pickup Location",
                    label: "A",
                    map: map,
                });

            markerB = new google.maps.Marker({
                position: pointB,
                title: "Drop-off Location",
                label: "B",
                map: map,
            });

            // get route from A to B
            calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

            // Listen for changes in the routes and update traffic
            google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
                updateTraffic(directionsDisplay.getDirections(), map);
            });

            // Start watching user's position
            watchUserPosition();

        }

        function MyLocationControl(controlDiv, map) {
            // Set CSS for the control button
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#fff';
            controlUI.style.border = '1px solid #ccc';
            controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            controlUI.style.cursor = 'pointer';
            controlUI.style.marginRight = '10px';
            controlUI.style.textAlign = 'center';
            controlUI.title = 'Current location';
            controlDiv.appendChild(controlUI);

            // Set icon for the control button
            var controlText = document.createElement('div');
            controlText.style.color = 'rgb(25,25,25)';
            controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
            controlText.style.fontSize = '16px';
            controlText.style.lineHeight = '38px';
            controlText.innerHTML = '<i class="fa fa-map-marker" style="font-size:24px;color:red;padding: 11px;"></i>';
            controlUI.appendChild(controlText);

            // Setup click event listener
            controlUI.addEventListener('click', function() {
                // Center map on user's current location
                console.log('hamza');
                console.log(navigator.geolocation);
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(userLocation);
                    }, function() {
                        alert('Error: The Geolocation service failed.');
                    });
                } else {
                    alert('Error: Your browser doesn\'t support geolocation.');
                }
            });
        }


        function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
            directionsService.route({
                origin: pointA,
                destination: pointB,
                provideRouteAlternatives: true,
                travelMode: 'DRIVING',
                drivingOptions: {
                    departureTime: new Date(Date.now()), // current time
                    trafficModel: 'optimistic' // alternative: 'pessimistic', 'optimistic'
                }
            }, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    updateInfo(response);
                } else {
                    alert('Directions request failed due to ' + status);
                }
            });
        }

        // For time and total distance meausre
        function updateInfo(directionsResult) {
            var totalDistance = 0;
            var totalDuration = 0;
            var legs = directionsResult.routes[0].legs;
            for (var i = 0; i < legs.length; i++) {
                totalDistance += legs[i].distance.value;
                totalDuration += legs[i].duration.value;
            }
            var totalDistanceInMiles = totalDistance * 0.000621371; // Convert meters to miles
            var totalDurationInMinutes = Math.round(totalDuration / 60);
            var arrivalTime = new Date(Date.now() + totalDuration * 1000);
            var price = totalDistanceInMiles * 2;
            // Formatting the content with bold labels and different colors
            var infoContent = '<span style="color: blue; font-weight: bold;">Total Distance:</span> ' + totalDistanceInMiles
                .toFixed(2) + ' miles, ';
            infoContent += '<span style="color: green; font-weight: bold;">Total Duration:</span> ' +
                totalDurationInMinutes + ' mins, ';
            infoContent += '<span style="color: red; font-weight: bold;">Arrival Time:</span> ' + arrivalTime
                .toLocaleString()+', ';
            infoContent += '<span style="color: purple; font-weight: bold;">Price:</span> $' + price.toFixed(2);

            // Update the info div with the formatted content
            document.getElementById('info').innerHTML = infoContent;
        }

        // Function to update traffic information
        function updateTraffic(directionsResult, map) {
            var bounds = new google.maps.LatLngBounds();
            var legs = directionsResult.routes[0].legs;
            for (var i = 0; i < legs.length; i++) {
                var steps = legs[i].steps;
                for (var j = 0; j < steps.length; j++) {
                    var path = steps[j].path;
                    for (var k = 0; k < path.length; k++) {
                        bounds.extend(path[k]);
                    }
                }
            }
            map.fitBounds(bounds);
        }

        function watchUserPosition() {
            // Check if geolocation is available
            if (navigator.geolocation) {
                // Watch for changes in user's position
                navigator.geolocation.watchPosition(updateUserPosition, handleLocationError);
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

        function updateUserPosition(position) {
            var userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            // Update user marker position on the map
            if (!userMarker) {
                userMarker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    label: "U",
                });
            } else {
                userMarker.setPosition(userLocation);
            }

            // Update navigation instructions
            updateNavigation(userLocation);
        }

        function updateNavigation(userLocation) {
            // Get route directions
            console.log(userLocation);
            var request = {
                origin: userLocation,
                destination: 'New York City, NY', // Replace with your destination
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(response, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                    var route = response.routes[0];
                    var distanceToNextWaypoint = route.legs[0].steps[0].distance.value;
                    var bearingToNextWaypoint = bearing(userLocation, route.legs[0].steps[0].end_location);
                    // Provide navigation instructions based on distance and bearing
                    // You can implement this based on your specific requirements
                    console.log('Distance to next waypoint: ' + distanceToNextWaypoint + ' meters');
                    console.log('Bearing to next waypoint: ' + bearingToNextWaypoint);
                } else {
                    console.log('Directions request failed due to ' + status);
                }
            });
        }

        function bearing(start, end) {
            var startLat = toRadians(start.lat);
            var startLng = toRadians(start.lng);
            var endLat = toRadians(end.lat);
            var endLng = toRadians(end.lng);

            var dLng = endLng - startLng;

            var y = Math.sin(dLng) * Math.cos(endLat);
            var x = Math.cos(startLat) * Math.sin(endLat) -
                Math.sin(startLat) * Math.cos(endLat) * Math.cos(dLng);

            var bearing = Math.atan2(y, x);
            return toDegrees(bearing);
        }

        function toRadians(degrees) {
            return degrees * Math.PI / 180;
        }

        function toDegrees(radians) {
            return radians * 180 / Math.PI;
        }

        function handleLocationError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert('User denied the request for Geolocation.');
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert('Location information is unavailable.');
                    break;
                case error.TIMEOUT:
                    alert('The request to get user location timed out.');
                    break;
                case error.UNKNOWN_ERROR:
                    alert('An unknown error occurred.');
                    break;
            }
        }

        initMap();
    </script>
@endsection
