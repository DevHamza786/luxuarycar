@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">F.A.Q</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>FAQ</li>
            </ul>
        </div>
    </div>
</section>
<section class="FAQS section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="faq_content">
                    <h2 class="main_heading" data-aos="fade-up" data-aos-delay="100">Official
                        Rental Information:</h2>
                    <p class="mb_30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">Class aptent taciti
                        sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque ipsum
                        sapien, cursus eu scelerisque eget, scelerisque nec nulla. In turpis ex, congue ut scelerisque
                        ut, euismod a turpis. Nunc metus purus, pretium ac nunc vitae, ultricies euismod magna. Interdum
                        et malesuada fames ac ante ipsum primis in faucibus. Integer hendrerit, ipsum et tristique
                        tincidunt, mauris eros tristique dolor, ut ornare turpis sapien at tellus</p>
                    <div id="faq_accordion" class="faq_accordion mb_30">
                        <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-header"><a data-toggle="collapse" href="#collapse_one">When the rentals can
                                    be extended up?</a></div>
                            <div id="collapse_one" class="collapse show" data-parent="#faq_accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                            </div>
                        </div>
                        <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="card-header"><a class="collapsed" data-toggle="collapse"
                                    href="#collapse_two">What documents and ID are required to rent a car?</a></div>
                            <div id="collapse_two" class="collapse" data-parent="#faq_accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                            </div>
                        </div>
                        <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <div class="card-header"><a class="collapsed" data-toggle="collapse"
                                    href="#collapse_three">When ornare arcu tristique sit amet. Phasellus sed sapien
                                    vitae magna tempus pulvinar quis at est?</a></div>
                            <div id="collapse_three" class="collapse" data-parent="#faq_accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                            </div>
                        </div>
                        <div class="card aos-init" data-aos="fade-up" data-aos-delay="400">
                            <div class="card-header"><a class="collapsed" data-toggle="collapse"
                                    href="#collapse_four">Vestibulum ante ipsum primis in faucibus orci luctus et
                                    ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent
                                    per?</a></div>
                            <div id="collapse_four" class="collapse" data-parent="#faq_accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                            </div>
                        </div>
                        <div class="card aos-init" data-aos="fade-up" data-aos-delay="500">
                            <div class="card-header"><a class="collapsed" data-toggle="collapse"
                                    href="#collapse_five">When the rentals can be extended up?</a></div>
                            <div id="collapse_five" class="collapse" data-parent="#faq_accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 aos-init" data-aos="fade-up" data-aos-delay="600">Class aptent taciti sociosqu ad
                        litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque ipsum sapien, cursus eu
                        scelerisque eget, scelerisque nec nulla. In turpis ex, congue ut scelerisque ut, euismod a
                        turpis. Nunc metus purus, pretium ac nunc vitae, ultricies euismod magna. Interdum et malesuada
                        fames ac ante ipsum primis in faucibus. Integer hendrerit, ipsum et tristique tincidunt, mauris
                        eros tristique dolor, ut ornare turpis sapien at tellus</p>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
