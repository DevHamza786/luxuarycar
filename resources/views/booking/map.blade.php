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
            padding: 10px 10px 5px 10px;
            border: 1px solid #ccc;
            border-bottom: 0px;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
        }

        .status {
            background-color: white;
            padding-right: 10px;
            padding-left: 10px;
            padding-bottom: 10px;
            border: 1px solid #ccc;
            border-top: 0px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .driver_info {
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
                <div class="status">
                    @php

                        $distance = floatval(str_replace('mi', '', $booking->distance));
                        $price = $estimatedPrice->pricepermiles * $distance;

                    @endphp
                    <span style="font-weight: bold;" class="text-warning">Estimated Price: </span> ${{ $price }}
                    @if ($booking->status == 'Driver Assigned')
                        <span style="font-weight: bold;" class="text-success">Stauts: </span> Waiting For Driver Acception
                    @else
                        <span style="font-weight: bold;" class="text-success">Stauts: </span> {{ $booking->status }}
                    @endif
                </div>
                @if ($booking->status == 'Ride Accepted')
                    <div id="driverinfo"></div>
                    <div class="driver_info">
                        @php
                            $driverDocs = collect(json_decode($booking->driverData->driverDoc, true));
                            $carDocs = $driverDocs->where('type', 'car');
                            $firstCarDoc = $carDocs->first();
                            $imagePath = str_replace('public', 'storage', $firstCarDoc['path']);
                        @endphp
                        <div class="row">
                            <div class="col-sm-3">
                                <span style="font-weight: bold;" class="text-primary">Car Image: </span><br>
                                <img src="{{ asset('/' . $imagePath) }}" alt="Car Image" width="200" height="200"
                                    style="padding: 10px">
                            </div>
                            <div class="col-sm-3">
                                <span style="font-weight: bold;" class="text-primary">Driver Name:
                                </span><br>{{ $booking->driverData->name }}
                            </div>
                            <div class="col-sm-3">
                                <span style="font-weight: bold;" class="text-primary">Driver Number:
                                </span><br>{{ $booking->driverData->phone }}
                            </div>
                            <div class="col-sm-3">
                                <span style="font-weight: bold;" class="text-primary">Car Number: </span><br>
                                {{ $booking->driverData->driverData->register_no }},
                            </div>
                        </div>
                    </div>
                @endif
                <div id="directions-panel"></div>
                @if (auth()->user()->hasrole('driver'))
                    @if ($booking->status != 'Ride Accepted')
                        <button id="startridebtn" class="btn btn-primary btn-sm mt-2">Accept</button>
                    @endif
                    <button id="start_Ride" class="btn btn-success btn-sm mt-2" style="display: none;">Start</button>
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

        // For Map
        function initMap() {
            // Location Set
            pointA = new google.maps.LatLng({{ $pickupLocation['lat'] }}, {{ $pickupLocation['lng'] }});
            pointB = new google.maps.LatLng({{ $dropoffLocation['lat'] }}, {{ $dropoffLocation['lng'] }});

            var myOptions = {
                center: pointA,
                zoom: 16,
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

            // Get the booking status from Blade variable
            var bookingStatus = "{{ $booking->status }}";

            // Check booking status and decide to start navigation or display route
            if (bookingStatus === 'Ride Accepted') {
                watchDriverLocation(pointA);
            } else {
                // get route from A to B
                calculateAndDisplayRoute(pointA, pointB);
            }

            document.getElementById('start_Ride').addEventListener('click', function() {
                startRide();
            });


            $('#startridebtn').on('click', function() {
                var pathname = window.location.pathname;
                var segments = pathname.split('/');
                var id = segments[segments.length - 1];
                $.ajax({
                    url: '{{ route('booking-status') }}',
                    type: 'POST',
                    data: {
                        booking_id: id,
                        status: 'Ride Accepted'
                    },
                    success: function(response) {
                        if (response.success) {
                            startNavigation(pointA);
                            toastr.success(response.message);
                            // Reload the page after a short delay
                            setTimeout(function() {
                                location.reload();
                            }, 2000); // 2 seconds delay
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(response) {
                        if (response.error) {
                            toastr.success(response.message);
                            // Reload the page after a short delay
                            setTimeout(function() {
                                location.reload();
                            }, 2000); // 2 seconds delay
                        } else {
                            toastr.error(response.message);
                        }
                        console.error(response.error);
                    }
                });
            });
        }

        function watchDriverLocation(destination) {
            if (navigator.geolocation) {
                watchId = navigator.geolocation.watchPosition(function(position) {
                    var driverLocation = new google.maps.LatLng(position.coords.latitude, position.coords
                    .longitude);

                    // Create or update driver marker with car icon
                    if (!driverMarker) {
                        driverMarker = new google.maps.Marker({
                            position: driverLocation,
                            map: map,
                            icon: {
                                url: "{{ asset('assets/car.png') }}",
                                scaledSize: new google.maps.Size(40, 40)
                            }
                        });
                    } else {
                        driverMarker.setPosition(driverLocation);
                    }

                    // Check if driver location and pickup location are close enough
                    var distance = google.maps.geometry.spherical.computeDistanceBetween(driverLocation,
                    destination);
                    console.log(distance);
                    var thresholdDistance = 50; // Adjust as needed
                    if (distance <= thresholdDistance) {
                        document.getElementById('start_Ride').style.display = 'block';
                    } else {
                        document.getElementById('start_Ride').style.display = 'none';
                    }

                    // Update map center and bounds
                    map.setCenter(driverLocation);
                    map.panTo(driverLocation);

                    // Update the previous location to the current location for the next iteration
                    previousDriverLocation = driverLocation;
                }, function(error) {
                    console.log('Error getting driver location:', error);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }


        function startNavigation(destination) {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(function(position) {
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

                    // Calculate and display route
                    calculateAndDisplayRoute(driverLocation, destination);
                    updateMap(driverLocation, destination);

                    // Update the previous location to the current location for the next iteration
                    previousDriverLocation = driverLocation;
                }, function(error) {
                    console.log('Error getting driver location:', error);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }

        function calculateAndDisplayRoute(origin, destination) {
            var directionsService = new google.maps.DirectionsService();
            directionsService.route({
                origin: origin,
                destination: destination,
                provideRouteAlternatives: true,
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.IMPERIAL,
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

        function updateMap(driverLocation, destination) {
            var distance = google.maps.geometry.spherical.computeDistanceBetween(driverLocation, destination);
            var thresholdDistance = 50;
            if (distance <= thresholdDistance) {
                directionsDisplay.setMap(null);
                $('#start_Ride').show();
            } else {
                $('#start_Ride').hide();
            }

            var heading = google.maps.geometry.spherical.computeHeading(previousDriverLocation, driverLocation);
            var tilt = calculateTilt(previousDriverLocation, driverLocation);
            map.setOptions({
                heading: heading,
                tilt: tilt
            });
        }

        function updateInfo(directionsResult) {
            let totalDistance;
            let totalDuration;
            let time;
            var legs = directionsResult.routes[0].legs;
            for (var i = 0; i < legs.length; i++) {
                totalDistance = legs[i].distance.text;
                totalDuration = legs[i].duration.text;
                time = legs[i].duration_in_traffic.text
            }
            var totalDistanceInMiles = totalDistance // Convert meters to miles
            var totalDurationInMinutes = totalDuration;
            var arrivalTime = time;

            // Create the "Start Ride" button

            // Formatting the content with bold labels and different colors
            var infoContent = '<span style="color: blue; font-weight: bold;">Total Distance:</span> ' +
                totalDistanceInMiles + ' , ';
            infoContent += '<span style="color: green; font-weight: bold;">Total Duration:</span> ' +
                totalDurationInMinutes;

            // Update the info div with the formatted content
            document.getElementById('info').innerHTML = infoContent;
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

        function updateMapCenter(driverLocation) {

            driverMarker.setPosition(driverLocation);

            // Update map center to driver's location
            map.setCenter(driverLocation);
        }

        // Function to start the ride
        function startRide() {
            // Clear the watch position
            if (watchId) {
                navigator.geolocation.clearWatch(watchId);
            }

            // Start navigation from pickup to dropoff location
            calculateAndDisplayRoute(pickupLocation, dropoffLocation);

            // Update the driver's position as they move
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(function(position) {
                    var driverLocation = new google.maps.LatLng(position.coords.latitude, position.coords
                        .longitude);

                    // Update the driver marker position
                    if (driverMarker) {
                        driverMarker.setPosition(driverLocation);
                    }

                    // Update map center and bounds
                    map.setCenter(driverLocation);
                    map.panTo(driverLocation);

                    // Update the previous location to the current location for the next iteration
                    previousDriverLocation = driverLocation;
                }, function(error) {
                    console.log('Error getting driver location:', error);
                });
            }
        }

        // Function to end the ride
        function endRide() {
            // Calculate ride price
            var price = calculateRidePrice();
            // Display ride price
            alert('Ride price: ' + price);
        }

        initMap();
    </script>
@endsection
