<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <title>Luxuary Car Potral</title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ asset('home/assets/images/logo/favourite_icon.png') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-900px positon-xl-relative"
                style="background-image: url('auto/public/home/assets/images/bg.jpeg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        {{-- id="kt_sign_in_form" --}}
                        <form class="form w-100" novalidate="novalidate" method="POST"
                            action="{{ route('register') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <a href="{{ route('home') }}" class="mb-12">
                                    <img alt="Logo" src="{{ asset('home/assets/images/main-logo.jpg') }}"
                                        class="h-100px" />
                                </a>
                                <!--end::Title-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                    id="name" type="text" name="name" value="{{ old('name') }}" required
                                    autocomplete="email" autofocus />

                                @error('email')
                                    <!--begin::Alert-->
                                    <div
                                        class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mt-4 mb-10">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column">
                                            <h6 class="fw-bold text-danger" style="line-height: 40px;">
                                                {{ $message }}</h6>
                                            <!--begin::Title-->
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Close-->
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-danger text-danger"> X </span>
                                        </button>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Alert-->
                                @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                    id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus />

                                @error('email')
                                    <!--begin::Alert-->
                                    <div
                                        class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mt-4 mb-10">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column">
                                            <h6 class="fw-bold text-danger" style="line-height: 40px;">
                                                {{ $message }}</h6>
                                            <!--begin::Title-->
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Close-->
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-danger text-danger"> X </span>
                                        </button>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Alert-->
                                @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                    type="password" name="password" required autocomplete="current-password" />

                                @error('password')
                                    <!--begin::Alert-->
                                    <div
                                        class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mt-4 mb-10">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                            <h5 class="fw-bold text-danger" style="line-height: 40px;">Error!
                                                {{ $message }}</h5>
                                            <!--begin::Title-->
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Close-->
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-danger text-danger"> X </span>
                                        </button>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Alert-->
                                @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Re-tpye Password</label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                    type="password" name="password_confirmation" required
                                    autocomplete="current-password" />

                                @error('password')
                                    <!--begin::Alert-->
                                    <div
                                        class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mt-4 mb-10">

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column pe-0 pe-sm-10">
                                            <h5 class="fw-bold text-danger" style="line-height: 40px;">Error!
                                                {{ $message }}</h5>
                                            <!--begin::Title-->
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Close-->
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <span class="svg-icon svg-icon-1 svg-icon-danger text-danger"> X </span>
                                        </button>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Alert-->
                                @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                {{-- id="kt_sign_in_submit" --}}
                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Sign Up</span>
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        const appUrl = "{{ env('APP_URL') }}";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
