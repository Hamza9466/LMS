@extends('website.layouts.main')
@section('content')

        <!-- page Banner Section Start -->
          <!-- About Banner Caption Start -->
              @foreach ($abouts as $about)
    <div class="page-banner">
        <div class="page-banner__wrapper about-banner"
             style="background-image: url('{{ asset('storage/' . $about->banner_image) }}');">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb breadcrumb-white">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">About us</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

                <div class="about-banner-caption">
                    <h2 class="about-banner-caption__main-title">
                        <strong>{{ $about->text1 }}</strong> {{ $about->text2 }}
                    </h2>
                </div>
                <!-- About Banner Caption End -->

            </div>
        </div>
    </div>
@endforeach

        <!-- page Banner Section End -->

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu" style="background-image: url(assets/images/mobile-bg.jpg);">
            <div class="offcanvas-header bg-white">
                <div class="offcanvas-logo">
                    <a class="offcanvas-logo__logo" href="#"><img src="assets/images/dark-logo.png" alt="Logo"></a>
                </div>
                <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
            </div>

            <div class="offcanvas-body">
                <nav class="canvas-menu">
                    <ul class="offcanvas-menu">
                        <li><a class="active" href="#"><span>Home</span></a>

                            <ul class="mega-menu">
                                <li>
                                    <!-- Mega Menu Content Start -->
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="menu-content-list">
                                                    <a href="index.html" class="menu-content-list__link">Main Demo <span class="badge hot">Hot</span></a>
                                                    <a href="index-course-hub.html" class="menu-content-list__link">Course Hub</a>
                                                    <a href="index-online-academy.html" class="menu-content-list__link">Online Academy <span class="badge hot">Hot</span></a>
                                                    <a href="index-university.html" class="menu-content-list__link">University</a>
                                                    <a href="index-education-center.html" class="menu-content-list__link">Education Center <span class="badge hot">Hot</span></a>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="menu-content-list">
                                                    <a href="index-language-academic.html" class="menu-content-list__link">Language Academic</a>
                                                    <a href="index-single-instructor.html" class="menu-content-list__link">Single Instructor</a>
                                                    <a href="index-dev.html" class="menu-content-list__link">Dev <span class="badge new">New</span></a>
                                                    <a href="index-online-art.html" class="menu-content-list__link">Online Art <span class="badge new">New</span></a>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="menu-content-banner" style="background-image: url(assets/images/home-megamenu-bg.jpg);">
                                                    <h4 class="menu-content-banner__title">Achieve Your Goals With EduMall</h4>
                                                    <a href="#" class="menu-content-banner__btn btn btn-primary btn-hover-secondary">Purchase now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Mega Menu Content Start -->
                                </li>
                            </ul>




                        </li>

            </div>

            <!-- Header User Button Start -->
            <div class="offcanvas-user d-lg-none">
                <div class="offcanvas-user__button">
                    <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
                </div>
                <div class="offcanvas-user__button">
                    <button class="offcanvas-user__signup btn btn-primary btn-hover-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
                </div>
            </div>
            <!-- Header User Button End -->

        </div>
        <!-- Offcanvas End -->

        <!-- Counter Start -->
        <div class="counter-section section-padding-02">
            <div class="container custom-container">

                <!-- About Title Start -->
                <div class="about-section-title text-center" data-aos="fade-up" data-aos-duration="1000">

                    <h4 class="about-section-title__sub-title">Start to success</h4>
                    <h2 class="about-section-title__main-title">The Leading Global Marketplace for Learning and Instruction</h2>
                    <p>Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt egetnvallis a cras semper auctonvallis a cras semper aucto. Neque convallis a cras semper auctor. Liberoe convallis a cras semper atincidunt egetnval</p>

                </div>
                <!-- About Title End -->

                <!-- Counter Start -->
                <div class="counter mt-10">
                 @php use Illuminate\Support\Str; @endphp

<div class="row">
    @foreach ($icons as $icon)
        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
            <!-- Counter Item Start -->
            <div class="counter-item-03">

                <div class="counter-item-03__icon">
                    @if($icon->icon)
                        @if(Str::endsWith($icon->icon, '.svg'))
                            {{-- Inline SVG --}}
                            {!! file_get_contents(public_path('storage/' . $icon->icon)) !!}
                        @else
                            {{-- Normal image --}}
                            <img src="{{ asset('storage/' . $icon->icon) }}"
                                 alt="About Icon" width="80" height="74">
                        @endif
                    @else
                        {{-- Fallback image --}}
                        <img src="{{ asset('images/default-icon.png') }}"
                             alt="Default Icon" width="80" height="74">
                    @endif
                </div>

                <div class="counter-item-03__content">
                    <span class="counter-item-03__count count" data-count="{{ $icon->digits }}">0</span>
                    <p class="counter-item-03__text">{{ $icon->shortdescription }}</p>
                </div>

            </div>
            <!-- Counter Item End -->
        </div>
    @endforeach
</div>

                    </div>
                </div>
                <!-- Counter End -->

            </div>
        </div>
        <!-- Counter End -->

        <!-- Academics Section Start -->
        <div class="academics-section bg-color-05 section-padding-01 scene">
            <div class="container custom-container">

                <!-- Section Title Start -->
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section-title__title-03">What Make Us <mark>Spcecial?</mark></h2>
                    <p class="mt-0">Lorem ipsum dolor sit amet, consectetur adipisc ing elit.</p>
                </div>
                <!-- Section Title End -->

              <div class="row g-6">
    @foreach ($aboutPosts as $aboutPost)
        <div class="col-lg-4 col-md-4">
            <!-- Academics Start -->
            <div class="academics-item text-center" data-aos="fade-up" data-aos-duration="1000">
                <a href="#" class="academics-item__link">
                    <div class="academics-item__image">
                        {{-- Dynamic Image --}}
                        <img src="{{ asset('storage/' . $aboutPost->image) }}"
                             alt="{{ $aboutPost->heading }}"
                             width="370" height="269">

                        <h3 class="academics-item__title">{{ $aboutPost->heading }}</h3>
                    </div>
                    <div class="academics-item__description">
                        <p>{{ $aboutPost->shortdescription }}</p>
                    </div>
                </a>
            </div>
            <!-- Academics End -->
        </div>
    @endforeach
</div>


            </div>

            <div class="academics-section__shape-01" data-depth="-0.4"></div>
            <div class="academics-section__shape-02" data-depth="-0.4"></div>
            <div class="academics-section__shape-03" data-depth="0.4"></div>
        </div>
        <!-- Academics Section End -->

        <!-- Gallery Start -->
        <div class="gallery-section section-padding-01">
            <div class="container custom-container">

                <!-- Section Title Start -->
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="section-title__title-03">A Great Place to <mark>Grow</mark></h2>
                    <p class="mt-0">Lorem ipsum dolor sit amet, consectetur adipisc ing elit.</p>
                </div>
                <!-- Section Title End -->
@foreach ($aboutgallerys as $aboutgallery)
    <div class="row gy-6">
        <div class="col-md-8">
            <div class="gallery-image" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('storage/' . $aboutgallery->image1) }}" alt="Gallery" width="770" height="420">
            </div>
        </div>
        <div class="col-md-4">
            <div class="gallery-image" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('storage/' . $aboutgallery->image2) }}" alt="Gallery" width="370" height="420">
            </div>
        </div>
        <div class="col-md-6">
            <div class="gallery-image" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('storage/' . $aboutgallery->image3) }}" alt="Gallery" width="570" height="370">
            </div>
        </div>
        <div class="col-md-6">
            <div class="gallery-image" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('storage/' . $aboutgallery->image4) }}" alt="Gallery" width="570" height="370">
            </div>
        </div>
    </div>
@endforeach


                <div class="btn-margin gallery-btn text-center" data-aos="fade-up" data-aos-duration="1000">
                    <a href="#" class="gallery-btn__btn btn btn-primary btn-hover-secondary">Joim our team</a>
                </div>

            </div>
        </div>
        <!-- Gallery End -->
@endsection
