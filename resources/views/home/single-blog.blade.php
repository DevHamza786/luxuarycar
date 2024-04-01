@extends('home.layout.header')
@section('content')
<section class="breadcrumb_section text-center clearfix">
    <div class="page_title_area has_overlay d-flex align-items-center clearfix" data-bg-image="{{asset('home/assets/images/bg.jpeg')}}">
        <div class="overlay"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h1 class="page_title text-white mb-0">Single Blogs</h1>
        </div>
    </div>
    <div class="breadcrumb_nav clearfix" data-bg-color="#F2F2F2">
        <div class="container">
            <ul class="ul_li clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Single Blogs</li>
            </ul>
        </div>
    </div>
</section>

<section class="details_section blog_details sec_ptb_100 clearfix">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">Quisque eleifend elit vehicula dui
            maximus vehicula</h2>
        <ul class="post_meta ul_li mb_30 clearfix aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <li>Aug. 10, 2020</li>
            <li>by <a href="#!">Merkulove</a></li>
            <li><a href="#!">No Comments</a></li>
        </ul>
        <div class="details_image mb_30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300"><img
                src="{{asset('home/assets/images/01.jpg.png')}}" alt="image_not_found"></div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="mb_30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Etiam ac risus at augue
                    auctor convallis. Nulla pharetra bibendum sem, non egestas elit elementum quis.</h3>
                <p class="mb-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Phasellus porta pulvinar
                    metus, sit amet bibendum lectus hendrerit vel. Duis ullamcorper, justo quis hendrerit venenatis,
                    purus mi volutpat dui, vel commodo urna eros eget sapien. Vestibulum consequat lacinia sem, eu
                    faucibus justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    Pellentesque ipsum sapien, cursus eu scelerisque eget, scelerisque nec nulla</p>
                <p class="mb_30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Nunc metus purus, pretium
                    ac nunc vitae, ultricies euismod magna. Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. Integer hendrerit, ipsum et tristique tincidunt, mauris eros tristique dolor, ut ornare
                    turpis sapien at tellus. Etiam ac risus at augue auctor convallis. Nulla pharetra bibendum sem, non
                    egestas elit elementum quis.</p>
                <blockquote class="text-center mb_30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"><span
                        class="line bg_default_red"></span>
                    <p>“An engineer can look at the data, but he needs a translator from the cockpit - the driver - to
                        understand it completely. For example, only the driver can tell you why he abruptly takes his
                        foot off the gas pedal at a certain point. The data doesn't necessarily tell the engineer
                        whether the driver made a mistake at that point or the car was acting up. The information the
                        driver provides often helps determine the direction of development”</p>
                    <h4>Michael Schumacher</h4><span class="line bg_default_red mb-0"></span>
                </blockquote>
                <p class="mb_30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Phasellus porta pulvinar
                    metus, sit amet bibendum lectus hendrerit vel. Duis ullamcorper, justo quis hendrerit venenatis,
                    purus mi volutpat dui, vel commodo urna eros eget sapien. Vestibulum consequat lacinia sem, eu
                    faucibus justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    Pellentesque ipsum sapien, cursus eu scelerisque eget, scelerisque nec nulla. In turpis ex, congue
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
