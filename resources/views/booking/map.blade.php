@extends('layouts.app')
@section('content')
    <meta name="fetch-latest-data-url" content="{{ route('fetchLatestData', ['id' => ':id']) }}">
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

        /* Loader CSS */
        #loader {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 4px solid rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            border-top: 4px solid #3498db;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div id="loader" style="display: none;">Loading...</div>
                <div id="map"></div>
                <div id="info"></div>
                <div class="status pb-0">
                    @php
                        $distance = floatval(str_replace('mi', '', $booking->distance));
                        $price = $estimatedPrice->pricepermiles * $distance;
                    @endphp
                    <div class="row">
                        <div class="col-sm-3">
                            <span style="font-weight: bold;" class="text-warning">Estimated Price: </span>
                            ${{ $price }}
                        </div>
                        <div class="col-sm-9">
                            <p><span style="font-weight: bold;" class="text-success">Stauts: </span>
                                <span id="ridestatus">
                                {{($booking->status  == 'awaiting for driver') ? 'Waiting For Driver Acception' : $booking->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="driver_info" id="driverinfo" style="display: none;"></div>
                @if (auth()->user()->hasRole('driver'))
                    @if ($booking->status == 'awaiting for driver' || $booking->status == 'Driver Assigned')
                        <button id="startridebtn" class="btn btn-primary btn-sm mt-2">Accept</button>
                    @endif
                    <button id="start_Ride" class="btn btn-success btn-sm mt-2" style="display: none;">Start Ride</button>
                @endif
                @if ($booking->status == 'Ride Start')
                    <button id="end_Ride" class="btn btn-danger btn-sm mt-2">End Ride</button>
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
        var driverMarker;
        var directionsDisplay;
        var previousDriverLocation;
        var bookingStatus = "{{ $booking->status }}";
        const userRole = @json(auth()->user()->hasRole('driver'));
        const bookingId = '{{ $booking->id }}';
        const bookingStatusUrl = '{{ route('booking.status', ['bookingId' => $booking->id]) }}';
        let lastStatus = '{{ $booking->status }}';

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
            if (bookingStatus === 'Ride Accepted' || bookingStatus === 'Ride Start') {
                startNavigation(pointA);
                fetchLatestData();
            } else {
                // get route from A to B
                calculateAndDisplayRoute(pointA, pointB);
            }

            $('#start_Ride').on('click', function() {
                startRide();
            });


            $('#startridebtn').on('click', function() {
                var pathname = window.location.pathname;
                var segments = pathname.split('/');
                var id = segments[segments.length - 1];

                $('#loader').show();

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
                            $('#startridebtn').hide();
                            $('#start_Ride').show();
                            fetchLatestData();
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(response) {
                        toastr.error(response.message);
                    },
                    complete: function() {
                        // Hide the loader
                        $('#loader').hide();
                    }
                });
            });
        }

        function startNavigation(destination) {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(function(position) {
                    const driverLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Check if the user role is 'driver'
                    if (userRole) {
                        // Assuming pickupLocation is defined somewhere accessible
                        const distanceToPickup = google.maps.geometry.spherical.computeDistanceBetween(
                            new google.maps.LatLng(driverLocation.lat, driverLocation.lng),
                            new google.maps.LatLng({{ $pickupLocation['lat'] }}, {{ $pickupLocation['lng'] }})
                        );

                        // If driver is near the pickup location (e.g., within 1 km)
                        if (distanceToPickup <= 1000) { // 1 km in meters
                            if(bookingStatus == 'Ride Accepted'){
                                document.getElementById('start_Ride').style.display = 'block';
                            }
                        } else {
                            document.getElementById('start_Ride').style.display = 'none';
                        }
                    }

                    // Create or update driver marker with arrow icon
                    if (!driverMarker) {
                        driverMarker = new google.maps.Marker({
                            position: driverLocation,
                            map: map,
                            icon: {
                                url: "{{ asset('assets/car.png') }}",
                                scaledSize: new google.maps.Size(40, 40),
                                rotation: getBearing(previousDriverLocation, driverLocation)
                            }
                        });
                    } else {
                        driverMarker.setPosition(driverLocation);
                        driverMarker.setIcon({
                            url: "{{ asset('assets/car.png') }}",
                            scaledSize: new google.maps.Size(40, 40),
                            rotation: getBearing(previousDriverLocation, driverLocation)
                        });
                    }
                    // Calculate and display route
                    if(bookingStatus == 'Ride Start'){
                        var pickupLocation = new google.maps.LatLng({{ $pickupLocation['lat'] }}, {{ $pickupLocation['lng'] }});
                        var dropoffLocation = new google.maps.LatLng({{ $dropoffLocation['lat'] }}, {{ $dropoffLocation['lng'] }});

                        // Start navigation from pickup to dropoff location
                        calculateAndDisplayRoute(pickupLocation, dropoffLocation);
                    }else{
                        calculateAndDisplayRoute(driverLocation, destination);
                    }

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
                } else {
                    alert('Directions request failed due to ' + status);
                }
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
                time = legs[i].duration_in_traffic.text;
            }
            var totalDistanceInMiles = totalDistance; // Convert meters to miles if necessary
            var totalDurationInMinutes = totalDuration;
            var arrivalTime = time;

            // Formatting the content with bold labels and different colors
            var infoContent =
                '<div class="row"><div class="col-sm-3"><span style="color: blue; font-weight: bold;">Total Distance:</span> ' +
                totalDistanceInMiles + '</div>';
            infoContent += '<div class="col-sm-9"><span style="color: green; font-weight: bold;">Total Duration:</span> ' +
                totalDurationInMinutes + '</div></div>';

            // Update the info div with the formatted content
            document.getElementById('info').innerHTML = infoContent;
        }


        function startRide() {

            // Define pickup and dropoff locations
            var pickupLocation = new google.maps.LatLng({{ $pickupLocation['lat'] }}, {{ $pickupLocation['lng'] }});
            var dropoffLocation = new google.maps.LatLng({{ $dropoffLocation['lat'] }}, {{ $dropoffLocation['lng'] }});

            // Start navigation from pickup to dropoff location
            calculateAndDisplayRoute(pickupLocation, dropoffLocation);

            // Extract the booking ID from the URL
            var pathname = window.location.pathname;
            var segments = pathname.split('/');
            var id = segments[segments.length - 1];

            // Send AJAX request to update booking status
            $.ajax({
                url: '{{ route('booking-status') }}',
                type: 'POST',
                data: {
                    booking_id: id,
                    status: 'Ride Start'
                },
                success: function(response) {
                    if (response.success) {
                        // Update driver marker position to the initial pointA
                        var pointA = pickupLocation; // Assuming pointA is the same as pickupLocation
                        if (driverMarker) {
                            driverMarker.setPosition(pointA);
                        } else {
                            // Create a new marker if it doesn't exist
                            driverMarker = new google.maps.Marker({
                                position: pointA,
                                map: map,
                                title: 'Driver Location'
                            });
                        }
                        $('#start_Ride').hide();
                        $('#end_Ride').show();
                        fetchLatestData();

                        startNavigation(pointA);
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    if (response.error) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    console.log(response.error);
                }
            });

            // Update the driver's position as they move
            if (navigator.geolocation) {
                watchId = navigator.geolocation.watchPosition(function(position) {
                    var driverLocation = new google.maps.LatLng(position.coords.latitude, position.coords
                        .longitude);

                    // Update the driver marker position
                    if (driverMarker) {
                        driverMarker.setPosition(driverLocation);
                    }

                    // Update the previous location to the current location for the next iteration
                    previousDriverLocation = driverLocation;
                }, function(error) {
                    console.log('Error getting driver location:', error);
                });
            }
        }

        function getBearing(startLocation, endLocation) {
            if (!startLocation || !endLocation) return 0;

            const lat1 = startLocation.lat * Math.PI / 180;
            const lng1 = startLocation.lng * Math.PI / 180;
            const lat2 = endLocation.lat * Math.PI / 180;
            const lng2 = endLocation.lng * Math.PI / 180;

            const dLng = lng2 - lng1;

            const y = Math.sin(dLng) * Math.cos(lat2);
            const x = Math.cos(lat1) * Math.sin(lat2) - Math.sin(lat1) * Math.cos(lat2) * Math.cos(dLng);

            const brng = Math.atan2(y, x) * 180 / Math.PI;

            return (brng + 360) % 360;
        }

        function fetchLatestData() {
            var pathname = window.location.pathname;
            var segments = pathname.split('/');
            var id = segments[segments.length - 1];

            // Get the URL from the meta tag
            var urlTemplate = document.querySelector('meta[name="fetch-latest-data-url"]').getAttribute('content');
            var url = urlTemplate.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Update the status and driver info with the latest data
                    updateStatusAndDriverInfo(response);
                },
                error: function(error) {
                    console.log('Error fetching latest data:', error);
                }
            });
        }

        function updateStatusAndDriverInfo(data) {
            if (data.status == 'Ride Accepted' || data.status == 'Ride Start') {
                $('#driverinfo').show();
                var statusElement = document.getElementById('ridestatus');
                if (statusElement) {
                    statusElement.innerHTML = data.status;
                } else {
                    console.error('Status element not found');
                }
                // Construct the full URL for the image using asset() function
                var imageUrl = '{{ asset(':imagePath') }}';
                imageUrl = imageUrl.replace(':imagePath', data.driver.car_image);

                $('#driverinfo').html(`<div class="row">
                <div class="col-sm-3">
                    <span style="font-weight: bold;" class="text-primary">Car Image: </span><br>
                    <img src="${imageUrl}" alt="Car Image" width="200" height="200" style="padding: 10px">
                </div>
                <div class="col-sm-3">
                    <span style="font-weight: bold;" class="text-primary">Driver Name: </span><br>${data.driver.name}
                </div>
                <div class="col-sm-3">
                    <span style="font-weight: bold;" class="text-primary">Driver Number: </span><br>${data.driver.phone}
                </div>
                <div class="col-sm-3">
                    <span style="font-weight: bold;" class="text-primary">Car Number: </span><br>${data.driver.car_number}
                </div>
            </div>`);
            }
        }

                document.addEventListener('DOMContentLoaded', (event) => {

            function checkBookingStatus() {
                fetch(bookingStatusUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            if (data.status !== lastStatus) {
                                // Update the last known status
                                lastStatus = data.status;

                                if (data.status === 'Ride Accepted' || data.status === 'Ride Start') {
                                    // Refresh the page
                                    location.reload();
                                } else if (data.status === 'Ride Ended') {
                                    // Handle ride ended status
                                    // Example: redirect to a payment page
                                    // window.location.href = '{{ route('booking.payment') }}?booking_id=' +
                                    //     bookingId;
                                }
                            }
                        } else if (data.error) {
                            console.log('Error:', data.error);
                        }
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    });
            }

            // Poll every 5 seconds
            if (userRole != true) {
                const pollingInterval = setInterval(checkBookingStatus, 5000);
            }
        });

        $('#end_Ride').on('click', function() {
            var pathname = window.location.pathname;
            var segments = pathname.split('/');
            var id = segments[segments.length - 1];

            $.ajax({
                url: '{{ route('booking.end') }}', // Create this route in your web.php
                type: 'POST',
                data: {
                    booking_id: id,
                    status: 'Ride Ended'
                },
                success: function(response) {
                    if (response.success) {
                        // Redirect to the payment page
                        window.location.href = '{{ route('booking.payment') }}?booking_id=' +
                            id; // Create this route in your web.php
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    toastr.error('Error ending ride.');
                    console.log('Error ending ride:', error);
                }
            });
        });



    initMap();
    </script>
@endsection
