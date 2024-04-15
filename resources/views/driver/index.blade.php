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
                                    <span class="card-label fw-bolder fs-3 mb-1">All Driver</span>
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
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="w-25px">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            data-kt-check="true"
                                                            data-kt-check-target=".widget-9-check" />
                                                    </div>
                                                </th>
                                                <th class="min-w-150px">Name</th>
                                                <th class="min-w-140px">Email</th>
                                                <th class="min-w-120px">Phone</th>
                                                <th class="min-w-120px">Total Assigned Bookings</th>
                                                <th class="min-w-100px text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @if ($drivers->isEmpty())
                                                <tr>
                                                    <td colspan="5">
                                                        <p
                                                            class="text-hover-primary fs-7 text-center">
                                                            No Data Found</p>
                                                    </td>
                                                    <!-- Add more columns if needed -->
                                                </tr>
                                            @else
                                                @foreach ($drivers as $driver)
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <p
                                                                        class="text-hover-primary fs-7">
                                                                        {{ $driver->name }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-hover-primary fs-7">
                                                                {{ $driver->email }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-hover-primary fs-7">
                                                                {{ $driver->phone ?? 'N/A' }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-hover-primary fs-7">
                                                                {{ $driver->bookings_count ?? 'N/A' }}</p>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <form
                                                                    action="{{ route('users.softdelete', ['id' => $driver->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.5"
                                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.5"
                                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </form>
                                                                <a href="#">
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
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
        $('.driverSelect').on('change', function() {
            var selectedDriverId = $(this).val();
            var bookingId = $(this).closest('tr').data('booking-id');
            console.log(bookingId);
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
    </script>
@endsection
