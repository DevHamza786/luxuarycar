@extends('home.layout.header')
@section('content')
    <section class="breadcrumb_section text-center clearfix">
        <div class="page_title_area has_overlay d-flex align-items-center clearfix"
            data-bg-image="{{ asset('home/assets/images/bg.jpeg') }}">
            <div class="overlay"></div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h1 class="page_title text-white mb-0">Contact</h1>
            </div>
        </div>
        <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
            <div class="container">
                <ul class="ul_li clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="main_office_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between justify-content-sm-center">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="office_image aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"><img
                            src="{{ asset('home/assets/images/img_01.jpg') }}" alt="image_not_found"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="office_info aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="item_title">Main Office:</h3>
                        <ul class="ul_li_block clearfix">
                            <li><i class="fas fa-map-marker-alt"></i> Luxury Car Chauffeur Service
                                5000 Riverdale road, suite 312
                                Riverdale, New Jersey, N.J. 07457
                            </li>
                            <li><i class="fas fa-envelope"></i> info@luxuryccs.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact_form_section sec_ptb_100 clearfix">
        <div class="container">
            <div class="section_title mb_60 text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <h2 class="title_text mb-0"><span>Send Us a Message</span></h2>
            </div>
            <form id="contact_form" action="mail.php" method="POST" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form_item aos-init aos-animate" data-aos="fade-up" data-aos-delay="300"><input
                                type="text" name="firstname" placeholder="First Name"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form_item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400"><input
                                type="text" name="lastname" placeholder="Last Name"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form_item aos-init aos-animate" data-aos="fade-up" data-aos-delay="500"><input
                                type="email" name="email" placeholder="E-mail"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form_item aos-init aos-animate" data-aos="fade-up" data-aos-delay="600"><input
                                type="tel" name="phone" placeholder="Phone Number"></div>
                    </div>
                </div>
                <div class="form_item aos-init aos-animate" data-aos="fade-up" data-aos-delay="700">
                    <textarea name="message" placeholder="Leave Your Message"></textarea>
                </div>
                <div class="abtn_wrap text-center clearfix aos-init" data-aos="fade-up" data-aos-delay="800"><button
                        type="submit" value="submit" class="custom_btn btn_width bg_default_red text-uppercase">Send a
                        Message <img src="{{ asset('home/assets/images/icons/icon_01.png') }}"
                            alt="icon_not_found"></button></div>
            </form>
        </div>
    </section>
@endsection
