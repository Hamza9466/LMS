@extends('website.layouts.main')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

                <!-- Page Banner Caption Start -->
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Latest news <br> are on top all times</h2>
                </div>
                <!-- Page Banner Caption End -->

            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->
<!-- Blog Start -->
    <div class="blog-section section-padding-01">
        <div class="container custom-container">

         <div class="row gy-6 grid">
    @foreach ($blogs as $blog)
        <div class="col-xl-4 col-md-6 grid-item">
            <div class="blog-item-02" data-aos="fade-up" data-aos-duration="1000">
                <div class="blog-item-02__image">
                    <a href="{{ route('BlogDetail', $blog->slug) }}">

                        <img src="{{ asset('storage/' . $blog->feature_image) }}"
                            alt="{{ $blog->feature_image_alt ?? 'Blog Image' }}" width="370" height="201">
                    </a>
                </div>
                <div class="blog-item-02__content">
                    <div class="blog-item-02__meta">
                        <span class="meta-action"><i class="fas fa-calendar"></i>
                            {{ $blog->published_at }}</span>
                    </div>
                    <h3 class="blog-item-02__title">
                        <a href="{{ route('BlogDetail', $blog->slug) }}">{{ $blog->title }}</a>
                    </h3>
                    <p>{{ $blog->short_description }}</p>
                    <a class="blog-item-02__more btn btn-light btn-hover-white"
                        href="{{ route('BlogDetail', $blog->slug) }}">
                        Read More <i class="fas fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

            <!-- Page Pagination Start -->
            <div class="page-pagination">
                <ul class="pagination justify-content-center">
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                </ul>
            </div>
            <!-- Page Pagination End -->

        </div>
    </div>
    <!-- Blog End -->
@endsection
