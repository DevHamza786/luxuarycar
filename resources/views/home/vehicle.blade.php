@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">Vehicle</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Vehicle</li>
            </ul>
        </div>
    </div>
</section>
<section class="section feature_cars inner">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="car_box">
							<img src="{{asset('home/assets/images/vehicle/vehicle1.jpg')}}" alt="">
                            <div class="bottom-box">
                                <h5>Camry</h5>
                                <p>Airport shuttle, point to point car service, corporate transportation, flat rates</p>
                                <a href="">Read More</a>
                            </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="car_box">
							<img src="{{asset('home/assets/images/vehicle/vehicle2.jpg')}}" alt="">
                            <div class="bottom-box">
                                <h5>Cadillac XTS</h5>
                                <p>Airport shuttle, point to point car service, corporate transportation, flat rates</p>
                                <a href="">Read More</a>
                            </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="car_box">
							<img src="{{asset('home/assets/images/vehicle/vehicle3.jpg')}}" alt="">
                            <div class="bottom-box">
                                <h5>Chevrolet Suburban</h5>
                                <p>Airport shuttle, point to point car service, corporate transportation, flat rates</p>
                                <a href="">Read More</a>
                            </div>
						</div>
					</div>
                    <div class="col-md-4">
						<div class="car_box">
							<img src="{{asset('home/assets/images/vehicle/vehicle4.jpg')}}" alt="">
                            <div class="bottom-box">
                                <h5>Chevrolet Suburban</h5>
                                <p>Airport shuttle, point to point car service, corporate transportation, flat rates</p>
                                <a href="">Read More</a>
                            </div>
						</div>
					</div>
                    <div class="col-md-4">
						<div class="car_box">
							<img src="{{asset('home/assets/images/vehicle/vehicle4.jpg')}}" alt="">
                            <div class="bottom-box">
                                <h5>Lincoln Navigator</h5>
                                <p>Airport shuttle, point to point car service, corporate transportation, flat rates</p>
                                <a href="">Read More</a>
                            </div>
						</div>
					</div>
                    <div class="col-md-4">
						<div class="car_box">
							<img src="{{asset('home/assets/images/vehicle/vehicle5.jpg')}}" alt="">
                            <div class="bottom-box">
                                <h5>Mercedes Sprinter</h5>
                                <p>Airport shuttle, point to point car service, corporate transportation, flat rates</p>
                                <a href="">Read More</a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
