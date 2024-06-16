@extends('home.layout.header')
@section('content')
    <section class="slider_section text-white text-center position-relative clearfix">
        <div class="main_slider clearfix">
            <div class="item has_overlay d-flex align-items-center" data-bg-image="{{ asset('home/assets/images/bg.jpeg') }}">
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

            <div class="item has_overlay d-flex align-items-center"
                data-bg-image="{{ asset('home/assets/images/bg.jpeg') }}">
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

            <div class="item has_overlay d-flex align-items-center"
                data-bg-image="{{ asset('home/assets/images/bg.jpeg') }}">
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
    <section class="search_section clearfix">
        <ul class="button-group filters-button-group ul_li_center mb_30 clearfix" data-aos="fade-up" data-aos-delay="300">
            <li><button class="button getmode" data-filter=".sedan" data-set="mr">Manhattan</button></li>
            <li><button class="button getmode" data-filter=".sedan" data-set="Outsider">Outside of Manhattan</button></li>
            <li><button class="button getmode" data-filter=".sedan" data-set="Hourly">Hourly</button></li>
            <li><button class="button getmode" data-filter=".sedan" data-set="Weekly">Weekly</button></li>
            <li><button class="button getmode" data-filter=".sedan" data-set="Monthly">monthly/yearly services</button></li>
        </ul>
        <div class="feature_vehicle_filter element-grid clearfix">
            <div class="element-item sedan" data-category="sedan">
                <div class="container-fluid p-0" data-bg-color="#1E1E1E" data-aos="fade-up" data-aos-delay="100">
                    <div class="advance_search_form2">
                        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="mode" name="mode" value="" />
                            <div class="row">
                                <div class="row-wrap col-md-10">
                                    <div class="row">

                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">Date</h4>
                                                <input type="date" placeholder="20/Feb/2024" name="date"
                                                    id="date" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">Pick Up Time</h4>
                                                <div class="position-relative">
                                                    <input type="time" name="time" placeholder="12:00am" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">First Name</h4>
                                                <input type="text" name="fname" placeholder="Enter your name"
                                                    value="{{ Auth::check() && Auth::user()->hasrole('customer') ? Auth::user()->name : '' }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">Last Name</h4>
                                                <input type="text" name="lname" placeholder="Enter your name"
                                                    value=""
                                                    required>
                                                    {{-- {{ Auth::check() && Auth::user()->hasrole('customer') ? Auth::user()->name : '' }} --}}
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">Email</h4>
                                                <input type="email" name="email" placeholder="Enter your email"
                                                    value="{{ Auth::check() && Auth::user()->hasrole('customer') ? Auth::user()->email : '' }}"
                                                    required>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <h4 class="input_title text-white">Car Category</h4>
                                            <select class="form-control" name="car_category" required>
                                                <option value="">Please Select Car Category</option>
                                                <option value="Ultra Luxury">Ultra Luxury</option>
                                                <option value="Black Luxury">Black Luxury</option>
                                                <option value="SUV Luxury">SUV Luxury</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <h4 class="input_title text-white">No. of Pessenger</h4>
                                            <select class="form-control" name="no_pessenger" required>
                                                <option value="">Please Select No. of Pessenger</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">Pick Up Address</h4>
                                                <div class="position-relative">
                                                    <input id="pickupautocomplete" type="text" name="pick_location"
                                                        placeholder="choose your location" required>
                                                    <label for="location_two" class="input_icon">
                                                        <i id="pickupIcon" class="fas fa-map-marker-alt text-white"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="Pickup_latitudeArea">
                                            <label>Latitude</label>
                                            <input type="text" id="pickup_latitude" name="pickup_latitude"
                                                class="form-control" value="">
                                        </div>

                                        <div class="form-group" id="Pickup_longtitudeArea">
                                            <label>Longitude</label>
                                            <input type="text" name="pickup_longitude" id="pickup_longitude"
                                                class="form-control" value="">
                                        </div>

                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form_item">
                                                <h4 class="input_title text-white">Drop Off Address</h4>
                                                <div class="position-relative">
                                                    <input type="text" id="dropoffautocomplete" name="drop_location"
                                                        placeholder="choose your location" required>
                                                    <label for="location_two" class="input_icon"><i
                                                            class="fas fa-map-marker-alt text-white"></i></label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group" id="dropoff_latitudeArea">
                                            <label>Latitude</label>
                                            <input type="text" id="dropoff_latitude" name="dropoff_latitude"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group" id="dropoff_longtitudeArea">
                                            <label>Longitude</label>
                                            <input type="text" name="dropoff_longitude" id="dropoff_longitude"
                                                class="form-control" required>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-right">
                                    <button type="submit" class="custom_btn bg_default_red text-uppercase">Reserve
                                        Now <img src="{{ asset('home/assets/images/icons/icon_01.png') }}"
                                            alt="icon_not_found"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section about_us clearfix">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md-6">
                    <h5 class="sub-heading">ABOUT US</h5>
                    <h2 class="main_heading">What We Provide Is the Luxury Transport and Most Comfortable Experience</h2>
                </div>
                <div class="col-md-6">
                    <p style="text-align: justify !important;">Offering luxurious transportation and ensuring the utmost comfort for our clients is our priority.
                        Whether it's a chauffeured limousine service, a private jet charter, or a VIP travel experience, we
                        go above and beyond to provide unparalleled luxury and convenience. Our vehicles are meticulously
                        maintained, our staff is highly trained, and our services are tailored to exceed expectations. From
                        the moment you book with us until you reach your destination, expect nothing less than a seamless,
                        indulgent journey.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section feature_cars">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="car_box">
                        <img src="{{ asset('home/assets/images/leftcar.png') }}" alt="">
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
                        <img src="{{ asset('home/assets/images/centercar-2.png') }}" alt="">
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
                        <img src="{{ asset('home/assets/images/rightcar.png') }}" alt="">
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
                        <img src="{{ asset('home/assets/images/calender.png') }}" alt="">
                        <h3>Easy Online Booking</h3>
                        <p>Absolutely! We understand the importance of convenience, which is why we offer easy online
                            booking for all our services. Our user-friendly platform allows you to effortlessly reserve your
                            luxury transportation with just a few clicks</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dev_service">
                        <img src="{{ asset('home/assets/images/men.png') }}" alt="">
                        <h3>Professional Drivers</h3>
                        <p>Our team of professional drivers is the cornerstone of our commitment to excellence in luxury
                            transportation. Each driver undergoes rigorous training and screening to ensure they possess the
                            highest level of skill, professionalism, and dedication to customer service.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dev_service">
                        <img src="{{ asset('home/assets/images/car.png') }}" alt="">
                        <h3>Variety of Car Brands</h3>
                        <p>We take pride in offering a diverse selection of car brands to cater to your specific preferences
                            and needs. From luxury sedans to SUVs, exotic sports cars to executive vans, our fleet features
                            top-of-the-line vehicles</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dev_service">
                        <img src="{{ asset('home/assets/images/card.png') }}" alt="">
                        <h3>Online Payment</h3>
                        <p>To streamline your booking experience further, we offer secure online payment options for your
                            convenience and peace of mind. Our encrypted payment gateway ensures that your transactions are
                            safe and protected</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services_we_provide section" data-bg-image="{{ asset('home/assets/images/bg.jpeg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="sub-heading">Our Services</h5>
                    <h2 class="main_heading">Services We
                        Provide</h2>


                </div>
                <div class="col-md-4">
                    <h5 class="city-to_city-rides">City to City rides</h5>
                    <p>Absolutely! We provide city-to-city rides to accommodate your travel needs seamlessly. Whether you're
                        traveling for business meetings, leisurely sightseeing, or any other purpose</p>
                    <h5 class="city-to_city-rides">Airport transfers</h5>
                    <p>Our airport transfer service is designed to provide seamless and stress-free transportation to and
                        from the airport. Whether you're arriving or departing, we understand the importance of timely and
                        reliable transfers</p>

                </div>
                <div class="col-md-4">
                    <h5 class="city-to_city-rides">Chauffer Weekly/Monthly/Yearly services</h5>
                    <p>We offer flexible chauffeur services on a monthly, weekly, or yearly basis to cater to your long-term
                        transportation needs. Whether you require consistent transportation for business meetings, special
                        events, or personal errands, our chauffeur services</p>
                    <h5 class="city-to_city-rides">A Diverse Selection</h5>
                    <p>Certainly! Our airport transfer service offers a diverse selection of vehicles to cater to your
                        preferences and requirements. Whether you prefer the elegance of a luxury sedan, the spaciousness of
                        an SUV, or the prestige of a chauffeured Sprinter, we have the perfect vehicle to suit your needs.
                    </p>

                </div>
            </div>
        </div>
    </section>
    <section class="left_right">
        <div class="container-fluid p-0">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('home/assets/images/Section.png') }}" alt="">
                </div>
                <div class="col-md-5">
                    <div class="right-counter_sec">
                        <h5 class="sub-heading">Only the best</h5>
                        <h2 class="main_heading">We Provide Best</h2>
                        <p style="text-align: justify !important;">Absolutely, providing only the best is our top priority. From our meticulously maintained fleet
                            of luxury vehicles to our professional chauffeurs and personalized service, we are dedicated to
                            delivering excellence in every aspect of your experience. Our commitment to quality extends to
                            every detail, ensuring that your journey is not just satisfactory, but truly exceptional.</p>
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
    <section class="section trip" data-bg-image="{{ asset('home/assets/images/marcedise.gif') }}">
        <h2 class="main_heading mb-5">We make sure that your every trip is comfortable</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="boxtrip">
                        <img src="{{ asset('home/assets/images/icon1.png') }}" alt="">
                        <p>Luxury Vehicle Selection</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxtrip">
                        <img src="{{ asset('home/assets/images/icon1.png') }}" alt="">
                        <p>27/7 Service Available</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxtrip">
                        <img src="{{ asset('home/assets/images/icon1.png') }}" alt="">
                        <p>Luxury Vehicle Selection</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxtrip">
                        <img src="{{ asset('home/assets/images/icon1.png') }}" alt="">
                        <p>Luxury Vehicle Selection</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxtrip">
                        <img src="{{ asset('home/assets/images/icon1.png') }}" alt="">
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
                    <a href="{{ url('/single-blog') }}" class="article_box">
                        <img class="img-fluid" src="{{ asset('home/assets/images/01.jpg.png') }}" alt="">
                        <div class="bottom_ar">
                            <p>Lorem ipsum dolor sit amet consectetur. Maecenas est suscipit.</p>
                            <div class="inner_box">
                                <div class="left">
                                    <img src="{{ asset('home/assets/images/user.png') }}" alt="">
                                    <span>Admin</span>
                                </div>
                                <div class="right">
                                    <img src="{{ asset('home/assets/images/calart.png') }}" alt="">
                                    <span>January 18, 2017</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/single-blog') }}" class="article_box">
                        <img class="img-fluid" src="{{ asset('home/assets/images/02.jpg.png') }}" alt="">
                        <div class="bottom_ar">
                            <p>Lorem ipsum dolor sit amet consectetur. Maecenas est suscipit.</p>
                            <div class="inner_box">
                                <div class="left">
                                    <img src="{{ asset('home/assets/images/user.png') }}" alt="">
                                    <span>Admin</span>
                                </div>
                                <div class="right">
                                    <img src="{{ asset('home/assets/images/calart.png') }}" alt="">
                                    <span>January 18, 2017</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/single-blog') }}" class="article_box">
                        <img class="img-fluid" src="{{ asset('home/assets/images/03.jpg.png') }}" alt="">
                        <div class="bottom_ar">
                            <p>Lorem ipsum dolor sit amet consectetur. Maecenas est suscipit.</p>
                            <div class="inner_box">
                                <div class="left">
                                    <img src="{{ asset('home/assets/images/user.png') }}" alt="">
                                    <span>Admin</span>
                                </div>
                                <div class="right">
                                    <img src="{{ asset('home/assets/images/calart.png') }}" alt="">
                                    <span>January 18, 2017</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="Weekly section" data-bg-image="{{ asset('home/assets/images/bg-car.jpeg') }}">
        <div class="container">
            <div class="row">
                <h2 class="main_heading">
                    25% off on Weekly use with minimum 30 Hours.
                </h2>
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
                    <h2 class="main_heading">COVID-19 Safety Measures</h2>
                    <p style="text-align: justify !important;">
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
@section('script')
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>
    <script>
        $(document).ready(function() {
            $("#Pickup_latitudeArea").addClass("d-none");
            $("#Pickup_longtitudeArea").addClass("d-none");

            $("#dropoff_latitudeArea").addClass("d-none");
            $("#dropoff_longtitudeArea").addClass("d-none");

            $('button.getmode').click(function() {
                // Get the data-set value of the clicked button
                dataSetValue = $(this).data('set');
                // Set the value of the hidden input field
                $('#mode').val(dataSetValue);
            });

            function setModeValue() {
                // Get the data-set value of the first button with class "getmode"
                var dataSetValue = $('button.getmode:first').data('set');
                // Set the value of the hidden input field
                $('#mode').val(dataSetValue);
            }

            setModeValue();
        });

        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('pickupautocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#pickup_latitude').val(place.geometry['location'].lat());
                $('#pickup_longitude').val(place.geometry['location'].lng());
            });

            var input = document.getElementById('dropoffautocomplete');
            var dropoffautocomplete = new google.maps.places.Autocomplete(input);

            dropoffautocomplete.addListener('place_changed', function() {
                var place = dropoffautocomplete.getPlace();
                $('#dropoff_latitude').val(place.geometry['location'].lat());
                $('#dropoff_longitude').val(place.geometry['location'].lng());
            });

        }

        document.addEventListener("DOMContentLoaded", function() {
            // Get the map icon element
            var pickupIcon = document.getElementById("pickupIcon");
            // Add click event listener to the map icon
            pickupIcon.addEventListener("click", function() {
                // Check if Geolocation is supported by the browser
                if (navigator.geolocation) {
                    // Get the current position
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;

                        var geocoder = new google.maps.Geocoder();
                        var latlng = {
                            lat: latitude,
                            lng: longitude
                        };

                        // Update the input fields with latitude and longitude
                        document.getElementById('pickup_latitude').value = latitude;
                        document.getElementById('pickup_longitude').value = longitude;

                        geocoder.geocode({
                            'location': latlng
                        }, function(results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    // Get the formatted address
                                    var locationName = results[0].formatted_address;

                                    // Update the input fields with latitude, longitude, and location name
                                    $('#pickup_latitude').val(latitude);
                                    $('#pickup_longitude').val(longitude);
                                    $('#pickupautocomplete').val(locationName);

                                    // Use the location name as needed
                                    console.log("Location Name:", locationName);
                                } else {
                                    console.log('No results found');
                                }
                            } else {
                                console.log('Geocoder failed due to: ' + status);
                            }
                        });

                        // Use the latitude and longitude as needed
                        console.log("Latitude:", latitude);
                        console.log("Longitude:", longitude);

                    }, function(error) {
                        alert('Error occurred: ' + error.message);

                    });
                } else {
                    // Geolocation is not supported by this browser
                    alert("Geolocation is not supported");
                }
            });
        });

        // Get the input field
        var dateInput = document.getElementById('date');

        // Get today's date
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;

        // Set the minimum date
        dateInput.setAttribute('min', today);
    </script>
@endsection
