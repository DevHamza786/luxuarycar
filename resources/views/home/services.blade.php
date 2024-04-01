
@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">Services</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</section>
<section class="service_section sec_ptb_100 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service_primary text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="item_icon"><i class="far fa-shield-alt"></i></div>
                    <h3 class="item_title">Secured Payment Guarantee</h3>
                    <p class="mb-0">Vestibulum at ultrices elit. Maecenas faucibus vulputate vestibulum</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service_primary text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="item_icon"><i class="fal fa-headset"></i></div>
                    <h3 class="item_title">Help Center &amp; Support 24/7</h3>
                    <p class="mb-0">Vestibulum at ultrices elit. Maecenas faucibus vulputate vestibulum</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service_primary text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="700">
                    <div class="item_icon"><i class="fas fa-gem"></i></div>
                    <h3 class="item_title">Booking Luxury and Sport Cars</h3>
                    <p class="mb-0">Vestibulum at ultrices elit. Maecenas faucibus vulputate vestibulum</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service_primary text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="item_icon"><i class="fas fa-briefcase"></i></div>
                    <h3 class="item_title">Corporate and Business Services</h3>
                    <p class="mb-0">Vestibulum at ultrices elit. Maecenas faucibus vulputate vestibulum</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service_primary text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="item_icon"><i class="fas fa-user-plus"></i></div>
                    <h3 class="item_title">Car Sharing Options</h3>
                    <p class="mb-0">Vestibulum at ultrices elit. Maecenas faucibus vulputate vestibulum</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service_primary text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="item_icon"><i class="fas fa-user-tie"></i></div>
                    <h3 class="item_title">Limousine and Chauffeur Hire</h3>
                    <p class="mb-0">Vestibulum at ultrices elit. Maecenas faucibus vulputate vestibulum</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
