@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{ asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">Blogs</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>blogs</li>
            </ul>
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
@endsection

