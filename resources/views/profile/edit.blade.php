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
                        <div class="card  mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                data-bs-target="#kt_account_signin_method">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Reset Password</h3>
                                </div>
                            </div>
                            <!--end::Card header-->

                            <!--begin::Content-->
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">

                                    <!--begin::Password-->
                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                        <!--begin::Label-->
                                        <div id="kt_signin_password" class="d-none">
                                            <div class="fs-6 fw-bold mb-1">Password</div>
                                            <div class="fw-semibold text-gray-600">************</div>
                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Edit-->
                                        <div id="kt_signin_password_edit" class="flex-row-fluid">
                                            <!--begin::Form-->
                                            <form id="kt_signin_change_password"
                                                class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                novalidate="novalidate" method="POST" enctype="multipart/form-data">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                                            <label for="currentpassword"
                                                                class="form-label fs-6 fw-bold mb-3">Current
                                                                Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid "
                                                                name="currentpassword" id="currentpassword">
                                                            <div
                                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                                            <label for="newpassword"
                                                                class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid "
                                                                name="newpassword" id="newpassword">
                                                            <div
                                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0 fv-plugins-icon-container">
                                                            <label for="confirmpassword"
                                                                class="form-label fs-6 fw-bold mb-3">Confirm New
                                                                Password</label>
                                                            <input type="password"
                                                                class="form-control form-control-lg form-control-solid "
                                                                name="confirmpassword" id="confirmpassword">
                                                            <div
                                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-text mb-5">Password must be at least 8 character and
                                                    contain symbols</div>

                                                <div class="d-flex">
                                                    <button id="kt_password_submit" type="button"
                                                        class="btn btn-primary me-2 px-6">Update Password</button>
                                                    {{-- <button id="kt_password_cancel" type="button"
                                                        class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button> --}}
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Edit-->

                                        <!--begin::Action-->
                                        <div id="kt_signin_password_button" class="ms-auto d-none">
                                            <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Password-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
                        </div>

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
    var passwordUpdateRoute = '{{ route("passwordUpdate") }}';
</script>
<script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
@endsection
