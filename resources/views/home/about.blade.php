@extends('home.layout.header')
@section('content')
    <section class="breadcrumb_section text-center clearfix">
        <div class="page_title_area has_overlay d-flex align-items-center clearfix"
            data-bg-image="{{ asset('home/assets/images/bg.jpeg') }}">
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
                    <img class="img-fluid" src="{{ asset('home/assets/images/image4.png') }}" alt="">
                </div>
                <div class="col-md-7">
                    <h2 class="main_heading">About Us</h2>
                    <p>
                        At Luxury Car Chauffeur Services , we believe that every journey should be an extraordinary
                        experience. As a premier provider of luxury transportation services, we are committed to delivering
                        unparalleled comfort, convenience, and sophistication to our discerning clients.
                        <br>
                        With a focus on excellence and attention to detail, we have built a reputation for providing the
                        highest level of service in the industry. From our meticulously maintained fleet of top-of-the-line
                        vehicles to our team of professional chauffeurs, we strive to exceed expectations at every turn.
                        <br>
                        Our commitment to excellence extends beyond just transportation. We understand that each client has
                        unique needs and preferences, which is why we offer personalized service tailored to your specific
                        requirements. Whether you're traveling for business or leisure, attending a special event, or simply
                        exploring the city in style, we go above and beyond to ensure that your experience with us is
                        nothing short of exceptional.
                        <br>
                        With Luxury Car Chauffeur Services, you can trust that you

                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
