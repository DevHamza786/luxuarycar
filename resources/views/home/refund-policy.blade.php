@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">Refund Policy</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>Refund Policy</li>
            </ul>
        </div>
    </div>
</section>
<section class="right_left section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h2 class="main_heading">Refund Policy</h2>
                <p class="main-p">
                    If customers cancel their reservation 72 hours in advance then there is no cancellation fee and no refund.
                </p>
                <p class="main-p">
                    We accept VISA/MASTERCARD/AMERICAN EXPRESS
                </p>
                <p class="main-p">
                    You understand that information received from you may be used by  Luxury car Chauffeur Service for any or all of the reasons described herein.
                </p>
                <p class="main-p">
                    Luxury car Chauffeur Service may also disclose your information:
                    <ul style="font-size: 14px;">
                        <li>If Luxury car Chauffeur Service determines a violation of the Terms has occurred.</li>
                        <li>If Luxury car Chauffeur Service believes such disclosure is necessary to identify or bring legal action regarding injury or interference with the rights of  Luxury car Chauffeur Service or another user of the Website.</li>
                        <li>To respond to legal process or as otherwise required by law and in fraud protection or investigation.</li>
                    </ul>
                </p>
                <p class="main-p">
                    None of the luxury car chauffeur service corporation  parties shall have any liability whatsoever for any data breach or unauthorized access to user content or other information on or submitted through the web site, regardless of the level of care used by luxury car chauffeur service corporation
                <p>
            </div>
        </div>
    </div>
</section>
@endsection
