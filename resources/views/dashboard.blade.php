@extends('layouts.app')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-3">
                        <!--begin: Statistics Widget 6-->
                        <div class="card bg-dark card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body my-3">
                                <a href="#" class="card-title fw-bold text-white fs-5 mb-3 d-block">
                                    Total Bookings </a>

                                <div class="py-1">
                                    <span class="text-white fs-1 fw-bold me-2">{{ $booking->count() }}</span>
                                </div>

                                <div class="progress h-7px bg-white bg-opacity-50 mt-7">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: {{ ($booking->count()) }}%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end:: Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>

                    <div class="col-xl-3">
                        <!--begin: Statistics Widget 6-->
                        <div class="card bg-light-success card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body my-3">
                                <a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">
                                    Complete Bookings </a>

                                <div class="py-1">
                                    <span class="text-gray-900 fs-1 fw-bold me-2">{{ $booking->where('status','complete')->count() }}</span>
                                </div>
                                <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                                    <div class="progress-bar bg-success" role="progressbar"
                                         style="width: {{ $booking->count() > 0 ? ($booking->where('status','complete')->count() / $booking->count()) * 100 : 0 }}%"
                                         aria-valuenow="{{ $booking->count() > 0 ? ($booking->where('status','complete')->count() / $booking->count()) * 100 : 0 }}"
                                         aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!--end:: Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>

                    <div class="col-xl-3">
                        <!--begin: Statistics Widget 6-->
                        <div class="card bg-light-warning card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body my-3">
                                <a href="#" class="card-title fw-bold text-warning fs-5 mb-3 d-block">
                                    New Bookings </a>

                                <div class="py-1">
                                    <span class="text-gray-900 fs-1 fw-bold me-2">{{ $booking->where('status','awaiting for driver')->count() }}</span>
                                </div>

                                <div class="progress h-7px bg-warning bg-opacity-50 mt-7">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $booking->count() > 0 ? ($booking->where('status','awaiting for driver')->count() / $booking->count()) * 100 : 0 }}%" aria-valuenow="{{ $booking->count() > 0 ? ($booking->where('status','awaiting for driver')->count() / $booking->count()) * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!--end:: Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>

                    <div class="col-xl-3">
                        <!--begin: Statistics Widget 6-->
                        <div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body my-3">
                                <a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">
                                    Assigned Bookings </a>

                                <div class="py-1">
                                    <span class="text-gray-900 fs-1 fw-bold me-2">{{ $booking->where('status','Driver Assigned')->count() }}</span>
                                </div>

                                <div class="progress h-7px bg-primary bg-opacity-50 mt-7">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $booking->count() > 0 ? ($booking->where('status','Driver Assigned')->count() / $booking->count()) * 100 : 0 }}%" aria-valuenow="{{ $booking->count() > 0 ? ($booking->where('status','Driver Assigned')->count() / $booking->count()) * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end:: Body-->
                        </div>
                        <!--end: Statistics Widget 6-->
                    </div>
                </div>

                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <!--begin::Tables Widget 9-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">New Booking</span>
                                </h3>
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
    <script type="text/javascript">
        $(function() {
            var table = $('#bookingtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.booking') }}",
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
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
                ]
            });
        });
    </script>
@endsection
