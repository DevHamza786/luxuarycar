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
                <div id="directions-panel"></div>
                @if(auth()->user()->hasrole('driver'))
                    <button id="startridebtn" class="btn btn-primary btn-sm mt-2">Accept</button>
                    <button id="star_tRide" class="btn btn-success btn-sm mt-2" style="display: none;">Ride Start</button>
                @endif
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
        var map;
        var pointA;
        var markerA;
        var markerB;
        var intervalId;
        var userMarker;
        var driverMarker;
        var directionsDisplay;
        var previousDriverLocation;

        function initMap() {
            // Location Set
            pointA = new google.maps.LatLng({{ $pickupLocation['lat'] }}, {{ $pickupLocation['lng'] }});
            pointB = new google.maps.LatLng({{ $dropoffLocation['lat'] }}, {{ $dropoffLocation['lng'] }});

            var myOptions = {
                center: pointA,
                zoom: 16,
                heading: 320,
                tilt: 45,
                mapId: "e920995903773e78",
            };

            map = new google.maps.Map(document.getElementById('map'), myOptions);

            // Initialize DirectionsService and DirectionsRenderer
            directionsService = new google.maps.DirectionsService();
            directionsDisplay = new google.maps.DirectionsRenderer({
                map: map,
                polylineOptions: {
                    strokeColor: "#0000FF",
                    strokeOpacity: 0.8,
                    strokeWeight: 5,
                },
            });

            // Add markers for pickup and drop-off locations
            markerA = new google.maps.Marker({
                position: pointA,
                label: "A",
                map: map,
            });

            markerB = new google.maps.Marker({
                position: pointB,
                label: "B",
                map: map,
            });

            // removeExtraMarkers();


            // get route from A to B
            calculateAndDisplayRoute(pointA, pointB);

            $('#startridebtn').on('click', function() {
                // Call function to update map with user location and navigation directions
                startNavigation(pointA);
            });
        }

        function startNavigation(destination) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var driverLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Create or update driver marker with arrow icon
                    if (!driverMarker) {
                        driverMarker = new google.maps.Marker({
                            position: driverLocation,
                            map: map,
                            icon: "{{ asset('assets/car.png') }}",
                            scaledSize: new google.maps.Size(40, 40)
                        });
                    } else {
                        driverMarker.setPosition(driverLocation);
                    }

                    calculateAndDisplayRoute(driverLocation, destination);

                    // Update route and map center as the driver progresses
                    var previousDriverLocation =
                        driverLocation; // Store the previous location for calculating heading
                    intervalId = setInterval(function() {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var newDriverLocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };

                            // Update the marker position
                            driverMarker.setPosition(newDriverLocation);

                            // Calculate and display route
                            calculateAndDisplayRoute(newDriverLocation, destination);

                            // Update map center and bounds
                            map.setCenter(newDriverLocation);
                            map.panTo(newDriverLocation);
                            fitMapToBounds(newDriverLocation, destination);

                            // Check if driver location and pickup location are the same
                            var distance = google.maps.geometry.spherical.computeDistanceBetween(
                                newDriverLocation, destination);
                            var thresholdDistance = 50; // Adjust as needed
                            if (distance <= thresholdDistance) {
                                directionsDisplay.setMap(null);
                                $('#star_tRide').show();
                            } else {
                                $('#star_tRide').hide();
                            }

                            // Calculate the heading between the driver's current location and the previous location
                            var heading = google.maps.geometry.spherical.computeHeading(
                                previousDriverLocation, newDriverLocation
                            );

                            // Calculate the tilt based on the driver's speed or other factors
                            var tilt = calculateTilt(previousDriverLocation, newDriverLocation);

                            // Set the heading and tilt of the map
                            map.setOptions({
                                heading: heading,
                                tilt: tilt
                            });

                            // Update the previous location to the current location for the next iteration
                            previousDriverLocation = newDriverLocation;
                        }, function(error) {
                            console.log('Error getting driver location:', error);
                        });
                    }, 10000); // Update route and map center every 10 seconds
                }, function(error) {
                    console.log('Error getting driver location:', error);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }

        // Function to start the ride
        function startRide() {
            // Calculate distance between pickup and dropoff
            var distance = google.maps.geometry.spherical.computeDistanceBetween(pickupLocation, dropoffLocation);
            // Display distance to driver
            alert('Distance to dropoff: ' + distance + ' meters');
        }

        // Function to end the ride
        function endRide() {
            // Calculate ride price
            var price = calculateRidePrice();
            // Display ride price
            alert('Ride price: ' + price);
        }

        // Function to remove extra markers
        // function removeExtraMarkers() {
        //     extraMarker.setMap(null);
        // }


        function calculateAndDisplayRoute(origin, destination) {
            var directionsService = new google.maps.DirectionsService();
            directionsService.route({
                origin: origin,
                destination: destination,
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
                    // showRouteDetails(response);
                } else {
                    alert('Directions request failed due to ' + status);
                }
            });
        }

        function fitMapToBounds(driverLocation, destination) {
            var bounds = new google.maps.LatLngBounds();
            bounds.extend(driverLocation);
            bounds.extend(destination);
            map.fitBounds(bounds);
        }

        function calculateTilt(driverLocation, newDriverLocation) {
            return 45; // Default tilt angle (degrees)
        }


        function showRouteDetails(directionsResult) {
            var route = directionsResult.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';

            // For each step, display the instructions and distance
            for (var i = 0; i < route.legs[0].steps.length; i++) {
                var step = route.legs[0].steps[i];
                summaryPanel.innerHTML += '<b>Step ' + (i + 1) + ':</b> ';
                summaryPanel.innerHTML += step.instructions + '<br>';
                summaryPanel.innerHTML += step.distance.text + '<br><br>';
            }
        }

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
            var price = totalDistanceInMiles * 15;

            // Create the "Start Ride" button

            // Formatting the content with bold labels and different colors
            var infoContent = '<span style="color: red; font-weight: bold;">Arrival Time:</span> ' + arrivalTime
                .toLocaleString() + ', ';
            infoContent += '<span style="color: blue; font-weight: bold;">Total Distance:</span> ' + totalDistanceInMiles
                .toFixed(2) + ' miles, ';
            infoContent += '<span style="color: green; font-weight: bold;">Total Duration:</span> ' +
                totalDurationInMinutes + ' mins, ';

            // Update the info div with the formatted content
            document.getElementById('info').innerHTML = infoContent;
        }

        function updateMapCenter(driverLocation) {

            driverMarker.setPosition(driverLocation);

            // Update map center to driver's location
            map.setCenter(driverLocation);
        }



        initMap();
    </script>
@endsection
