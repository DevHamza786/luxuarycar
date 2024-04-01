@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">About Us</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About</li>
            </ul>
        </div>
    </div>
</section>
<section class="right_left section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <img class="img-fluid" src="{{ asset('home/assets/images/image4.png')}}" alt="">
            </div>
            <div class="col-md-7">
                <h2 class="main_heading">About Us</h2>
                <p>
                    In the current climate, we understand the importance of taking additional safety measures. We have implemented thorough cleaning and sanitization protocols for our vehicles, following guidelines from health authorities. Our chauffeurs also adhere to strict hygiene practices, including wearing masks and regularly sanitizing their hands. Your safety is our utmost concern, and we strive to provide a hygienic and safe environment throughout your journey. <br> When you choose New York Limo, you can travel with confidence, knowing that your privacy and safety are our number one priorities.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
