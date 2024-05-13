@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img class="border border-dark rounded"
                                        src="{{ isset(auth()->user()->avatar) ? asset('storage/' . auth()->user()->avatar) : asset('assets/media/avatars/blank.png') }}"
                                        alt="Avatar" />
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                            fill="black" />
                                                        <path
                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>{{ $user->email }}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                                rx="1" transform="rotate(90 13 6)" fill="black" />
                                                            <path
                                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                        data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">Earnings</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                                rx="1" transform="rotate(90 13 6)" fill="black" />
                                                            <path
                                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                        data-kt-countup-value="75">0</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">Rides</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">Profile Compleation</span>
                                            <span class="fw-bolder fs-6">{{ $profileCompletionScore }}%</span>
                                        </div>
                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                            <div class="bg-success rounded h-5px" role="progressbar"
                                                style="width: {{ $profileCompletionScore }}%;"
                                                aria-valuenow="{{ $profileCompletionScore }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                    </div>
                </div>
                <!--end::Navbar-->
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" method="POST" action="{{ route('driver.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success mx-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger mx-4">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">Avatar</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <!--begin::Image input-->
                                        <input type="file" id="profile-image-input" accept="image/*"
                                            style="display: none;" name="profile">
                                        <label for="profile-image-input" id="profile-image-label"
                                            class="profile-image-label">
                                            <img id="profile-image-preview" class="profile-image"
                                                src="{{ isset($user->avatar) ? asset('storage/' . $user->avatar) : asset('assets/media/avatars/blank.png') }}"
                                                alt="profile picture" height="200">
                                        </label>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label required fw-bold fs-6">Full Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-12 fv-row">
                                                <input type="hidden" name="userid"
                                                    class="form-control form-control-lg mb-3 mb-lg-0"
                                                    value="{{ $user->id }}" />
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg mb-3 mb-lg-0"
                                                    placeholder="Full Name" value="{{ $user->name }}" required />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Phone</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Phone number must be active"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4 fv-row">
                                        <input type="tel" name="phone" class="form-control form-control-lg"
                                            placeholder="Enter your phone number"
                                            value="{{ isset($user->phone) ? $user->phone : '' }}" required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4 fv-row">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Enter your email" value="{{ $user->email }}" readonly />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Town</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4 fv-row">
                                        <input type="text" name="Town" class="form-control form-control-lg"
                                            placeholder="Enter your town"
                                            value="{{ isset($driver->city) ? $driver->city : '' }}" required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Car Category</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4 fv-row">
                                        <select class="form-control form-control-lg" name="car_category" required>
                                            <option value="">Please Select Car Category</option>
                                            <option value="Ultra Luxury"
                                                {{ isset($driver->category) && $driver->category  == 'Ultra Luxury' ? 'selected' : '' }}>Ultra
                                                Luxury
                                            </option>
                                            <option value="Black Luxury"
                                                {{ isset($driver->category) && $driver->category == 'Black Luxury' ? 'selected' : '' }}>Black
                                                Luxury
                                            </option>
                                            <option value="SUV Luxury"
                                                {{ isset($driver->category) && $driver->category == 'SUV Luxury' ? 'selected' : '' }}>SUV Luxury
                                            </option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Car Register No.</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4 fv-row">
                                        <input type="text" name="register_no" class="form-control form-control-lg"
                                            placeholder="Enter your car register number"
                                            value="{{ isset($driver->register_no) ? $driver->register_no : '' }}"
                                            required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Car Model</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-4 fv-row">
                                        <input type="text" name="model" class="form-control form-control-lg"
                                            placeholder="Enter your car model"
                                            value="{{ isset($driver->model) ? $driver->model : '' }}" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                                        <span class="required">Car Register No.</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-10 fv-row">
                                        <select class="form-control form-control-lg" name="pessenger" required>
                                            <option value="" class="muted-text">Please Select No of Pessenger
                                            </option>
                                            <option value="4"
                                                {{ isset($driver->category) == '4' ? 'selected' : '' }}>4
                                            </option>
                                            <option value="5"
                                                {{ isset($driver->category) == '5' ? 'selected' : '' }}>5
                                            </option>
                                            <option value="6"
                                                {{ isset($driver->category) == '6' ? 'selected' : '' }}>6
                                            </option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label text-lg-right">Driving License</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-10">
                                        <input class="form-control" type="file" name="license[]" required multiple />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label text-lg-right">Car Pictures</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-10">
                                        <input class="form-control" type="file" name="car[]" required multiple />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Display Picture-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-2 col-form-label text-lg-right">Driving License</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-10">
                                        @if(!$driverDoc->isempty())
                                            @foreach ($driverDoc as $data)
                                                <img class="border border-dark rounded"
                                                        src="{{ asset('storage/'.str_replace('public/', '', $data->path)) }}"
                                                        alt="{{ $data->name }}" height="200">
                                            @endforeach
                                        @else
                                            <label class="col-form-label text-lg-center">No Document Uploaded</label>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Display Picture-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script>
        // Function to handle image upload and preview
        function handleImageUpload() {
            const input = document.getElementById('profile-image-input');
            const preview = document.getElementById('profile-image-preview');

            input.addEventListener('change', function() {
                const file = input.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }
            });
        }

        // Call the function when the page loads
        window.addEventListener('load', handleImageUpload);
    </script>
@endsection
