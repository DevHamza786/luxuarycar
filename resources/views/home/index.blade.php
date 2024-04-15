@extends('home.layout.header')
@section('content')
<!-- slider_section - start
			================================================== -->
<section class="slider_section text-white text-center position-relative clearfix">
    <div class="main_slider clearfix">
        <div class="item has_overlay d-flex align-items-center" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
            <div class="overlay"></div>
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="slider_content text-center">
                            <h3 class="text-white text-uppercase" data-animation="fadeInUp" data-delay=".3s">
                                Chauffeur Service & Luxury Car Service In Manhattan, NYC, NJ, CT</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item has_overlay d-flex align-items-center" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
            <div class="overlay"></div>
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="slider_content text-center">
                            <h3 class="text-white text-uppercase" data-animation="fadeInUp" data-delay=".3s">
                                Chauffeur Service & Luxury Car Service In Manhattan, NYC, NJ, CT</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item has_overlay d-flex align-items-center" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
            <div class="overlay"></div>
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="slider_content text-center">
                            <h3 class="text-white text-uppercase" data-animation="fadeInUp" data-delay=".3s">
                                Chauffeur Service & Luxury Car Service In Manhattan, NYC, NJ, CT</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="carousel_nav clearfix">
        <button type="button" class="main_left_arrow"><i class="fal fa-chevron-left"></i></button>
        <button type="button" class="main_right_arrow"><i class="fal fa-chevron-right"></i></button>
    </div>
</section>
<!-- slider_section - end
			================================================== -->


<!-- search_section - start
			================================================== -->
<section class="search_section clearfix">
    <ul class="button-group filters-button-group ul_li_center mb_30 clearfix" data-aos="fade-up" data-aos-delay="300">
        <li><button class="button" data-filter=".sedan">Distance from Manhattin</button></li>
        <li><button class="button" data-filter=".minhatten">Distance outside of Minhatten</button></li>
        <li><button class="button" data-filter=".hourly">Hourly</button></li>
        <li><button class="button" data-filter=".weekly">Weekly</button></li>
        <li><button class="button" data-filter=".monthly">monthly/yearly services</button></li>
    </ul>
    <div class="feature_vehicle_filter element-grid clearfix">
        <div class="element-item sedan" data-category="sedan">
            <div class="container-fluid p-0" data-bg-color="#1E1E1E" data-aos="fade-up" data-aos-delay="100">
                <div class="advance_search_form2">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row-wrap col-md-10">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Time</h4>
                                            <div class="position-relative">
                                                <input type="time" name="time" placeholder="12:00am">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Date</h4>
                                            <input type="date" placeholder="20/Feb/2024" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">First Name</h4>
                                            <input type="text" name="fname" placeholder="Micheal">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Last Name</h4>
                                            <input type="text" name="lname" placeholder="Turner">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Email</h4>
                                            <input type="email" name="email" placeholder="michealjohn@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Address</h4>
                                            <div class="position-relative">
                                                <input id="location_two" type="text" name="pick_location"
                                                    placeholder="26817 Lodge Close">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Drop Off Address</h4>
                                            <input type="text" id="location_two" name="drop_location"
                                                placeholder="1642 N Jackson Street">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Reserve
                                    Now <img src="{{ asset('home/assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: absolute; left: 0px; top: 0px; display: none;" class="element-item minhatten "
            data-category="minhatten">
            <div class="container-fluid p-0" data-bg-color="#1E1E1E" data-aos="fade-up" data-aos-delay="100">
                <div class="advance_search_form2">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row-wrap col-md-10">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Time</h4>
                                            <div class="position-relative">
                                                <input type="time" name="time" placeholder="12:00am">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Date</h4>
                                            <input type="date" placeholder="20/Feb/2024" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">First Name</h4>
                                            <input type="text" name="fname" placeholder="Micheal">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Last Name</h4>
                                            <input type="text" name="lname" placeholder="Turner">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Email</h4>
                                            <input type="email" name="email" placeholder="michealjohn@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Address</h4>
                                            <div class="position-relative">
                                                <input id="location_two" type="text" name="pick_location"
                                                    placeholder="26817 Lodge Close">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Drop Off Address</h4>
                                            <input type="text" id="location_two" name="drop_location"
                                                placeholder="1642 N Jackson Street">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Reserve
                                    Now <img src="{{ asset('home/assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: absolute; left: 0px; top: 0px; display: none;" class="element-item hourly "
            data-category="hourly">
            <div class="container-fluid p-0" data-bg-color="#1E1E1E" data-aos="fade-up" data-aos-delay="100">
                <div class="advance_search_form2">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row-wrap col-md-10">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Time</h4>
                                            <div class="position-relative">
                                                <input type="time" name="time" placeholder="12:00am">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Date</h4>
                                            <input type="date" placeholder="20/Feb/2024" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">First Name</h4>
                                            <input type="text" name="lname" placeholder="Micheal">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Last Name</h4>
                                            <input type="text" name="fname" placeholder="Turner">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Email</h4>
                                            <input type="email" name="email" placeholder="michealjohn@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Address</h4>
                                            <div class="position-relative">
                                                <input id="location_two" type="text" name="pick_location"
                                                    placeholder="26817 Lodge Close">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Drop Off Address</h4>
                                            <input type="text" id="location_two" name="drop_location"
                                                placeholder="1642 N Jackson Street">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Reserve
                                    Now <img src="{{ asset('home/assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: absolute; left: 0px; top: 0px; display: none;" class="element-item weekly "
            data-category="monthly">
            <div class="container-fluid p-0" data-bg-color="#1E1E1E" data-aos="fade-up" data-aos-delay="100">
                <div class="advance_search_form2">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row-wrap col-md-10">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Time</h4>
                                            <div class="position-relative">
                                                <input type="time" name="time" placeholder="12:00am">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Date</h4>
                                            <input type="date" placeholder="20/Feb/2024" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">First Name</h4>
                                            <input type="text" name="fname" placeholder="Micheal">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Last Name</h4>
                                            <input type="text" name="lanme" placeholder="Turner">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Email</h4>
                                            <input type="email" name="email" placeholder="michealjohn@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Address</h4>
                                            <div class="position-relative">
                                                <input id="location_two" type="text" name="pick_location"
                                                    placeholder="26817 Lodge Close">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Drop Off Address</h4>
                                            <input type="text" id="location_two" name="drop_location"
                                                placeholder="1642 N Jackson Street">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Reserve
                                    Now <img src="{{ asset('home/assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: absolute; left: 0px; top: 0px; display: none;" class="element-item monthly "
            data-category="monthly">
            <div class="container-fluid p-0" data-bg-color="#1E1E1E" data-aos="fade-up" data-aos-delay="100">
                <div class="advance_search_form2">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row-wrap col-md-10">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Time</h4>
                                            <div class="position-relative">
                                                <input type="time" name="time" placeholder="12:00am">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Date</h4>
                                            <input type="date" placeholder="20/Feb/2024" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">First Name</h4>
                                            <input type="text" name="lanme" placeholder="Micheal">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Last Name</h4>
                                            <input type="text" name="fname" placeholder="Turner">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Email</h4>
                                            <input type="email" name="email" placeholder="michealjohn@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Pick Up Address</h4>
                                            <div class="position-relative">
                                                <input id="location_two" type="text" name="pick_location"
                                                    placeholder="26817 Lodge Close">
                                                <!-- <label for="location_two" class="input_icon"><i class="fas fa-map-marker-alt"></i></label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <h4 class="input_title text-white">Drop Off Address</h4>
                                            <input type="text" id="location_two" name="drop_location"
                                                placeholder="1642 N Jackson Street">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Reserve
                                    Now <img src="{{ asset('home/assets/images/icons/icon_01.png')}}" alt="icon_not_found"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- search_section - end
			================================================== -->


<!-- feature_section - start
			================================================== -->
<section class="section about_us clearfix">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <h5 class="sub-heading">ABOUT US</h5>
                <h2 class="main_heading">What We Provide Is The Luxury
                    Transport And Most Comfortable
                    Experience</h2>
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur. Amet leo amet urna amet senectus sem. Id porttitor a
                    egestas cras commodo ullamcorper in lectus. Eu adipiscing sed duis lectus. Fermentum id
                    facilisi neque.</p>
                <div class="call_to">
                    <a href="">
                        <img class="img-fluid" src="{{ asset('home/assets/images/head.png')}}" alt="">
                        <span>Call center: +1234 5678 901</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section feature_cars">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="car_box">
                    <img src="{{ asset('home/assets/images/leftcar.png')}}" alt="">
                    <form action="#">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="form_item">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Ultra Luxury</option>
                                    <option value="1">Ultra Luxury 1</option>
                                    <option value="2">Ultra Luxury 2</option>
                                    <option value="3">Ultra Luxury 3 </option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="car_box">
                    <img src="{{ asset('home/assets/images/centercar.png')}}" alt="">
                    <form action="#">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="form_item">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Black Luxury</option>
                                    <option value="1">Black Luxury 1</option>
                                    <option value="2">Black Luxury 2</option>
                                    <option value="3">Black Luxury 3 </option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="car_box">
                    <img src="{{ asset('home/assets/images/rightcar.png')}}" alt="">
                    <form action="#">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="form_item">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>SUV Luxury</option>
                                    <option value="1">SUV Luxury 1</option>
                                    <option value="2">SUV Luxury 2</option>
                                    <option value="3">SUV Luxury 3 </option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why_choose pb-5">
    <div class="top_sec">
        <h2 class="main_heading">
            Why Choose Us
        </h2>
        <p>Explore our first class limousine & car rental services</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="dev_service">
                    <img src="{{ asset('home/assets/images/calender.png')}}" alt="">
                    <h3>Easy Online Booking</h3>
                    <p>Lorem ipsum dolor sit amet,
                        consectadipiscing elit. Aenean commodo
                        ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dev_service">
                    <img src="{{ asset('home/assets/images/men.png')}}" alt="">
                    <h3>Professional Drivers</h3>
                    <p>Lorem ipsum dolor sit amet,
                        consectadipiscing elit. Aenean commodo
                        ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dev_service">
                    <img src="{{ asset('home/assets/images/car.png')}}" alt="">
                    <h3>Variety of Car Brands</h3>
                    <p>Lorem ipsum dolor sit amet,
                        consectadipiscing elit. Aenean commodo
                        ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dev_service">
                    <img src="{{ asset('home/assets/images/card.png')}}" alt="">
                    <h3>Online Payment</h3>
                    <p>Lorem ipsum dolor sit amet,
                        consectadipiscing elit. Aenean commodo
                        ligula eget dolor.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature_section - end
			================================================== -->


<!-- service we provide  -->
<section class="services_we_provide section" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="sub-heading">Our Services</h5>
                <h2 class="main_heading">Services We
                    Provide</h2>


            </div>
            <div class="col-md-4">
                <h5 class="city-to_city-rides">City to City rides</h5>
                <p>Tortor condimentum lacinia quis vel eros donec
                    odio. Feugiat fermentum in posuere urna. Faucibus
                    turpis in eun mi bibendum.</p>
                <h5 class="city-to_city-rides">Airport transfers</h5>
                <p>Tortor condimentum lacinia quis vel eros donec
                    odio. Feugiat fermentum in posuere urna. Faucibus
                    turpis in eun mi bibendum.</p>

            </div>
            <div class="col-md-4">
                <h5 class="city-to_city-rides">Chauffer Weekly/Monthly/Yearly services</h5>
                <p>Tortor condimentum lacinia quis vel eros donec
                    odio. Feugiat fermentum in posuere urna. Faucibus
                    turpis in eun mi bibendum.</p>
                <h5 class="city-to_city-rides">A Diverse Selection</h5>
                <p>Tortor condimentum lacinia quis vel eros donec
                    odio. Feugiat fermentum in posuere urna. Faucibus
                    turpis in eun mi bibendum.</p>

            </div>
        </div>
    </div>
</section>
<!-- service we provide  -->
<section class="left_right">
    <div class="container-fluid p-0">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('home/assets/images/Section.png')}}" alt="">
            </div>
            <div class="col-md-6">
                <div class="right-counter_sec">
                <h5 class="sub-heading">Only the best</h5>
                <h2 class="main_heading">We Provide Best</h2>
                <p>Praesent elementum facilisis leo vel fringilla est. Vest bulum lectus a urise ultrices eros
                    in cursus turpi uto.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="funfact_item text-left" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="counter_text mb-0"><span class="counter">21</span>+</h3>
                            <p class="item_title mb-0">Worldwide Rent Stations</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="funfact_item text-left" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="counter_text mb-0"><span class="counter">157</span>k</h3>
                            <p class="item_title mb-0">Worldwide Rent Stations</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section trip" data-bg-image="{{ asset('home/assets/images/marcedise.gif')}}">
    <h2 class="main_heading mb-5">We make sure that your every trip is comfortable</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="boxtrip">
                    <img src="{{ asset('home/assets/images/icon1.png')}}" alt="">
                    <p>Luxury Vehicle Selection</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="boxtrip">
                    <img src="{{ asset('home/assets/images/icon1.png')}}" alt="">
                    <p>27/7 Service Available</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="boxtrip">
                    <img src="{{ asset('home/assets/images/icon1.png')}}" alt="">
                    <p>Luxury Vehicle Selection</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="boxtrip">
                    <img src="{{ asset('home/assets/images/icon1.png')}}" alt="">
                    <p>Luxury Vehicle Selection</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="boxtrip">
                    <img src="{{ asset('home/assets/images/icon1.png')}}" alt="">
                    <p>Luxury Vehicle Selection</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section article text-center">
    <div class="top_section">
        <h2 class="main_heading">Articles & Tips</h2>
        <p>Explore some of the best tips from around the world</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{url('/single-blog')}}" class="article_box">
                    <img class="img-fluid" src="{{ asset('home/assets/images/01.jpg.png')}}" alt="">
                    <div class="bottom_ar">
                        <p>Lorem ipsum dolor sit amet consectetur. Maecenas est suscipit.</p>
                        <div class="inner_box">
                            <div class="left">
                                <img src="{{ asset('home/assets/images/user.png')}}" alt="">
                                <span>Admin</span>
                            </div>
                            <div class="right">
                                <img src="{{ asset('home/assets/images/calart.png')}}" alt="">
                                <span>January 18, 2017</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{url('/single-blog')}}" class="article_box">
                    <img class="img-fluid" src="{{ asset('home/assets/images/02.jpg.png')}}" alt="">
                    <div class="bottom_ar">
                        <p>Lorem ipsum dolor sit amet consectetur. Maecenas est suscipit.</p>
                        <div class="inner_box">
                            <div class="left">
                                <img src="{{ asset('home/assets/images/user.png')}}" alt="">
                                <span>Admin</span>
                            </div>
                            <div class="right">
                                <img src="{{ asset('home/assets/images/calart.png')}}" alt="">
                                <span>January 18, 2017</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{url('/single-blog')}}" class="article_box">
                    <img class="img-fluid" src="{{ asset('home/assets/images/03.jpg.png')}}" alt="">
                    <div class="bottom_ar">
                        <p>Lorem ipsum dolor sit amet consectetur. Maecenas est suscipit.</p>
                        <div class="inner_box">
                            <div class="left">
                                <img src="{{ asset('home/assets/images/user.png')}}" alt="">
                                <span>Admin</span>
                            </div>
                            <div class="right">
                                <img src="{{ asset('home/assets/images/calart.png')}}" alt="">
                                <span>January 18, 2017</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="Weekly section" data-bg-image="{{ asset('home/assets/images/bg-car.jpeg')}}">
    <div class="container">
        <div class="row">
            <h2 class="main_heading">
                22% off on Weekly use with minimum 30 Hours.
            </h2>
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
                <h2 class="main_heading">COVID-19 Safety Measures</h2>
                <p>
                    In the current climate, we understand the importance of taking additional safety measures. We have
                    implemented thorough cleaning and sanitization protocols for our vehicles, following guidelines from
                    health authorities. Our chauffeurs also adhere to strict hygiene practices, including wearing masks
                    and regularly sanitizing their hands. Your safety is our utmost concern, and we strive to provide a
                    hygienic and safe environment throughout your journey. <br> When you choose New York Limo, you can
                    travel with confidence, knowing that your privacy and safety are our number one priorities.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
