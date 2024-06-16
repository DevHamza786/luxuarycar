@extends('layouts.app')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-12 m-0 bg-white p-4 border rounded">

                        <form action="{{ url('charge') }}" method="post">
                            {{ csrf_field() }}
                            <input type="email" name="email" placeholder="Enter Email" />
                            <input type="text" name="amount" placeholder="Enter Amount" />
                            <input type="text" name="cc_number" placeholder="Card Number" />
                            <input type="text" name="expiry_month" placeholder="Month" />
                            <input type="text" name="expiry_year" placeholder="Year" />
                            <input type="text" name="cvv" placeholder="CW" />
                            <input type="submit" name="submit" value="Submit" />
                        </form>

                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Success message
            var successAlerts = document.getElementsByClassName('success-alert');
            if (successAlerts.length > 0) {
                for (var i = 0; i < successAlerts.length; i++) {
                    (function(alert) {
                        setTimeout(function() {
                            alert.style.transition = 'opacity 0.5s ease';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.style.display = 'none';
                            }, 500); // Wait for the transition to complete before hiding
                        }, 3000); // 3 seconds before starting the fade out
                    })(successAlerts[i]);
                }
            }

            // Error message
            var errorAlerts = document.getElementsByClassName('error-alert');
            if (errorAlerts.length > 0) {
                for (var i = 0; i < errorAlerts.length; i++) {
                    (function(alert) {
                        setTimeout(function() {
                            alert.style.transition = 'opacity 0.5s ease';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.style.display = 'none';
                            }, 500); // Wait for the transition to complete before hiding
                        }, 3000); // 3 seconds before starting the fade out
                    })(errorAlerts[i]);
                }
            }
        });
    </script>
@endsection
