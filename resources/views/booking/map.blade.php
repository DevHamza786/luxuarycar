@extends('layouts.app')
@section('content')
    <style>
        /* Set the size of the map */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div id="map"></div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
    <script>
        function initMap() {
            // Initialize map
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: {{ $pickupLocation['lat'] }},
                    lng: {{ $pickupLocation['lng'] }}
                },
                zoom: 13 // Adjust the zoom level as needed
            });

            // Add markers for pickup and drop-off locations
            var pickupMarker = new google.maps.Marker({
                position: {
                    lat: {{ $pickupLocation['lat'] }},
                    lng: {{ $pickupLocation['lng'] }}
                },
                map: map,
                title: 'Pickup Location'
            });

            var dropoffMarker = new google.maps.Marker({
                position: {
                    lat: {{ $dropoffLocation['lat'] }},
                    lng: {{ $dropoffLocation['lng'] }}
                },
                map: map,
                title: 'Drop-off Location'
            });

        }
    </script>
@endsection
