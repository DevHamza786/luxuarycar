<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
    <head>
		<title>Luxuary Car Potral</title>
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
						<form class="form w-100" novalidate="novalidate" action="{{ route('verify-otp') }}" method="POST">
                            @csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Verify Code</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Enter your otp to verify your login.</div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<input class="form-control form-control-solid" type="text" placeholder="" name="otp_code" autocomplete="off" required/>
                                <x-input-error :messages="$errors->get('otp_code')" class="mt-2 text-danger" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
								<button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
									<span class="indicator-label">Submit</span>
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
