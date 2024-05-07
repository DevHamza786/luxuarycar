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
                    <div class="col-xl-12">
                        <!--begin::Tables Widget 9-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <p class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">All Bookings</span>
                                </p>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!--begin::Datatable-->
                                <table id="bookingtable" class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-120px">Date</th>
                                            <th class="min-w-120px">Time</th>
                                            <th class="min-w-120px">Name</th>
                                            <th class="min-w-120px">Email</th>
                                            <th class="min-w-120px">Car Category</th>
                                            <th class="min-w-120px">Pickup Location</th>
                                            <th class="min-w-120px">Drop Location</th>
                                            <th class="min-w-120px">Driver</th>
                                            <th class="min-w-120px">Status</th>
                                            <th class="min-w-150px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                    </tbody>
                                </table>
                                <!--end::Datatable-->

                            </div>
                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 9-->
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
        $(function() {
            var table = $('#bookingtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('all.bookings') }}",
                columns: [
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        searchable: false
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable: false
                    },
                    {
                        data: 'car_category',
                        name: 'car_category'
                    },
                    {
                        data: 'pick_location',
                        name: 'pick_location'
                    },
                    {
                        data: 'drop_location',
                        name: 'drop_location'
                    },
                    {
                        data: 'driver',
                        name: 'driver'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    // {
                    //     data: 'created_at',
                    //     name: 'created_at'
                    // },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

            $('#bookingtable tbody').on('change', '.driver-select', function() {
                var selectedDriverId = $(this).val();
                var bookingId = table.row($(this).closest('tr')).data()
                    .id; // Assuming 'id' is the column name for booking ID
                console.log('Selected driver ID:', selectedDriverId);
                console.log('Booking ID:', bookingId);
                $.ajax({
                    url: '{{ route('assgin-driver') }}',
                    type: 'POST',
                    data: {
                        booking_id: bookingId,
                        driver_id: selectedDriverId
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            // Reload the page after a short delay
                            setTimeout(function() {
                                location.reload();
                            }, 2000); // 2 seconds delay
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (response.success) {
                            toastr.success(response.message);
                            // Reload the page after a short delay
                            setTimeout(function() {
                                location.reload();
                            }, 2000); // 2 seconds delay
                        } else {
                            toastr.error(response.message);
                        }
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
