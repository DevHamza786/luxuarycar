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
                                    <span class="card-label fw-bolder fs-3 mb-1">All Users</span>
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
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="userTable">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-150px">Name</th>
                                                <th class="min-w-140px">Email</th>
                                                <th class="min-w-120px">Phone</th>
                                                <th class="min-w-120px"># Booked Rides</th>
                                                <th class="min-w-120px">Status</th>
                                                <th class="min-w-100px">Actions</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <tbody class="text-gray-600 fw-semibold">
                                        </tbody>
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
        $(function() {
            var table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('all.users') }}",
                columns: [{
                        data: 'name',
                        name: 'name',
                        searchable: true
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable: true
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        searchable: true
                    },
                    {
                        data: 'user_rides_count',
                        name: 'user_rides_count',
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false

                    },
                ],
                columnDefs: [{
                    targets: 4, // Target the 6th column (0-based index)
                    render: function(data, type, full, meta) {
                        // Define options for the status dropdown
                        var options = ['inactive', 'active'];
                        // Construct the dropdown with options
                        var select = '<select class="form-control">';
                        options.forEach(function(option) {
                            console.log(option)
                            var selected = (data === option) ? 'selected' : '';
                            select += '<option value="' + option + '" ' + selected +
                                '>' + option.toUpperCase() + '</option>';
                        });
                        select += '</select>';
                        // Return the dropdown
                        return select;
                    }
                }]
            });

            $(document).on('change', '#userTable select', function() {
                var newValue = $(this).val();
                var rowData = table.row($(this).closest('tr')).data();
                var userID = rowData.id;
                console.log(newValue);
                console.log(userID);

                // Send an AJAX request to update the status
                $.ajax({
                    url: "{{ route('user.status') }}",
                    method: 'POST',
                    data: {
                        id: userID,
                        status: newValue
                    },
                    success: function(response) {
                        // Update the UI if necessary
                        // For example, you can update the status column in the DataTables table
                        table.cell({
                            row: table.row($(this).closest('tr')).index(),
                            column: 5
                        }).data(newValue).draw();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        toastr.error(error);
                    }
                });
            });
        });
    </script>
@endsection
