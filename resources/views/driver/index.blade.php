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
                                    <table id="drivertable"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-120px">Name</th>
                                                <th class="min-w-120px">Email</th>
                                                <th class="min-w-120px">Phone</th>
                                                <th class="min-w-120px">Car Category</th>
                                                <th class="min-w-120px">Passenger</th>
                                                <th class="min-w-120px">Total Bookings</th>
                                                <th class="min-w-120px">Status</th>
                                                <th class="min-w-120px">Actions</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="text-gray-600 fw-semibold">
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
    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" id="driverDetailsModal">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Drive Profile</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" id="driverDetailsBody">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            var table = $('#drivertable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('all.drivers') }}",
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
                        data: 'car_category',
                        name: 'car_category',
                        searchable: false
                    },
                    {
                        data: 'passenger',
                        name: 'passenger',
                        searchable: false
                    },
                    {
                        data: 'bookingCount',
                        name: 'bookingCount',
                        searchable: false
                    },
                    {
                        label: 'status',
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false

                    },
                ],
                columnDefs: [{
                    targets: 6, // Target the 6th column (0-based index)
                    render: function(data, type, full, meta) {
                        // Check the bookingCount
                        if (full.bookingCount > 0) {
                            // Return simple status text if bookingCount is greater than 0
                            return full.status;
                        } else {
                            // Define options for the status dropdown
                            var options = ['Incomplete', 'Complete', 'Inactive', 'Active'];
                            // Construct the dropdown with options
                            var select = '<select class="form-control">';
                            options.forEach(function(option) {
                                var selected = (full.status === option) ? 'selected' :
                                    '';
                                select += '<option value="' + option + '" ' + selected +
                                    '>' + option + '</option>';
                            });
                            select += '</select>';
                            // Return the dropdown
                            return select;
                        }
                    }
                }]
            });

            $(document).on('change', '#drivertable select', function() {
                var newValue = $(this).val(); // Get the new status value from the dropdown
                var rowData = table.row($(this).closest('tr')).data(); // Get the data for the row
                var driverId = rowData.id; // Assuming the driver ID is stored in the 'id' column
                // console.log(newValue);
                // console.log(driverId);

                // Send an AJAX request to update the status
                $.ajax({
                    url: "{{ route('driver.status') }}", // Replace with your backend endpoint
                    method: 'POST',
                    data: {
                        id: driverId,
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

        $(document).on('click', '.show-driver-details', function() {
            var driverId = $(this).data('driver-id');
            // console.log(driverId);
            // AJAX request to fetch driver details
            $.ajax({
                url: "{{ route('driver.data', ['id' => ':driverId']) }}".replace(':driverId', driverId),
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    var html = '';

                    if (response.driver.avatar) {
                        html += '<img src="{{ asset('storage/') }}' + '/' + response.driver.avatar +
                            '" alt="Avatar" height="200">';
                    }

                    html += '<p><strong>Name:</strong> ' + response.driver.name + '</p>';
                    html += '<p><strong>Email:</strong> ' + response.driver.email + '</p>';
                    html += '<p><strong>Phone:</strong> ' + response.driver.phone + '</p>';
                    html += '<p><strong>Status:</strong> ' + response.driver.status + '</p>';

                    if (response.driver.driver_data) {
                        html += '<p><strong>City:</strong> ' + response.driver.driver_data.city + '</p>';
                        html += '<p><strong>Model:</strong> ' + response.driver.driver_data.model + '</p>';
                        html += '<p><strong>Register No:</strong> ' + response.driver.driver_data.register_no +
                            '</p>';
                        html += '<p><strong>Category:</strong> ' + response.driver.driver_data.category +
                            '</p>';
                        html += '<p><strong>Passenger:</strong> ' + response.driver.driver_data.pessenger +
                            '</p>';
                        html += '<p><strong>Active:</strong> ' + response.driver.driver_data.active + '</p>';

                        html += '<p><strong>Account Type:</strong> ' + response.bank_account.account_type + '</p>';
                        html += '<p><strong>Routing Number:</strong> ' + response.bank_account.routing_number + '</p>';
                        html += '<p><strong>Bank Account:</strong> ' + response.bank_account.account_number + '</p>';
                        html += '<p><strong>Account Name:</strong> ' + response.bank_account.name_on_account + '</p>';
                    }

                    if (response.driver.driver_doc && response.driver.driver_doc.length > 0) {
                        // Separate files based on type
                        var licenseDocs = [];
                        var carDocs = [];
                        var registerCardDocs = [];
                        var insuranceCardDocs = [];


                        response.driver.driver_doc.forEach(function(doc) {
                            if (doc.type === 'license') {
                                licenseDocs.push(doc);
                            } else if(doc.type === 'car') {
                                carDocs.push(doc);
                            } else if (doc.type === 'registration_card'){
                                registerCardDocs.push(doc);
                            }else if(doc.type === 'insurance_card'){
                                insuranceCardDocs.push(doc);
                            }
                        });

                        // Append license documents
                        if (licenseDocs.length > 0) {
                            html += '<h4>License Documents</h4>';
                            licenseDocs.forEach(function(doc) {
                                html += '<p><strong>Name:</strong> ' + doc.name + '</p>';
                                // Append image if available
                                if (doc.path) {
                                    var imagePath = doc.path.replace('public/', '');
                                    html += '<img src="{{ asset('storage/') }}' + '/' +
                                        imagePath + '" alt="' + doc.name + '" height="200" width="200">';
                                }
                                // Add more details as needed
                            });
                        }

                        // Append car documents
                        if (carDocs.length > 0) {
                            html += '<h4>Car Documents</h4>';
                            carDocs.forEach(function(doc) {
                                html += '<p><strong>Name:</strong> ' + doc.name + '</p>';
                                // Append image if available
                                if (doc.path) {
                                    var imagePath = doc.path.replace('public/', '');
                                    html += '<img src="{{ asset('storage/') }}' + '/' +
                                        imagePath + '" alt="' + doc.name + '" height="200" width="200">';
                                }
                                // Add more details as needed
                            });
                        }

                        // Append register card documents
                        if (registerCardDocs.length > 0) {
                            html += '<h4>Register Card</h4>';
                            registerCardDocs.forEach(function(doc) {
                                html += '<p><strong>Name:</strong> ' + doc.name + '</p>';
                                // Append image if available
                                if (doc.path) {
                                    var imagePath = doc.path.replace('public/', '');
                                    html += '<img src="{{ asset('storage/') }}' + '/' +
                                        imagePath + '" alt="' + doc.name + '" height="200" width="200">';
                                }
                                // Add more details as needed
                            });
                        }

                        // Append insurance card documents
                        if (insuranceCardDocs.length > 0) {
                            html += '<h4>Insurance Card</h4>';
                            insuranceCardDocs.forEach(function(doc) {
                                html += '<p><strong>Name:</strong> ' + doc.name + '</p>';
                                // Append image if available
                                if (doc.path) {
                                    var imagePath = doc.path.replace('public/', '');
                                    html += '<img src="{{ asset('storage/') }}' + '/' +
                                        imagePath + '" alt="' + doc.name + '" height="200" width="200">';
                                }
                                // Add more details as needed
                            });
                        }
                    } else {
                        // If driverDoc is not defined or empty, display a message
                        html += '<p>No documents found.</p>';
                    }


                    $('#driverDetailsBody').html(html);
                    // Show the modal
                    $('#driverDetailsModal').modal('show');
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred while fetching driver details.');
                }
            });
        });
    </script>
@endsection
