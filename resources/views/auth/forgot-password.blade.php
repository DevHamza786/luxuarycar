<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
    <head><base href="../../../">
		<title>Luxuary Car Potral</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{ asset('home/assets/images/logo/favourite_icon.png')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="{{ route('home') }}" class="mb-12">
                        <img alt="Logo" src="{{ asset('home/assets/images/main-logo.jpg') }}"
                        class="h-100px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
                        <x-auth-session-status class="mb-4 text-center text-success" :status="session('status')" />
						<form class="form w-100" novalidate="novalidate" action="{{ route('password.email') }}" method="POST">
                            @csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Forgot Password ?</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
								<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" required/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
								<button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
									<span class="indicator-label">Submit</span>
									{{-- <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
								</button>
								<a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Password reset-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		{{-- <script src="{{ asset('assets/js/custom/authentication/password-reset/password-reset.js')}}"></script> --}}
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
