@extends('website.layouts.main')
@section('content')


   <div class="page-banner bg-color-05">

            <div class="page-banner__wrapper">
                <div class="container">

                    <!-- Page Breadcrumb Start -->
                    <div class="page-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Courses</li>
                        </ul>
                    </div>
                    <!-- Page Breadcrumb End -->

                    <!-- Page Banner Caption Start -->
                    <div class="page-banner__caption text-center">
                        <h2 class="page-banner__main-title">Courses</h2>
                    </div>
                    <!-- Page Banner Caption End -->

                </div>
            </div>
        </div>
<!-- Courses Start -->
        <div class="courses-section section-padding-01">
            <div class="container">

                <!-- Archive Filter Bars Start -->
                <div class="archive-filter-bars">

                    <div class="archive-filter-bar">
                        <p>We found <span>101</span> courses available for you</p>
                    </div>

                    <div class="archive-filter-bar">

                        <div class="filter-bar-wrapper">
                            <span>See</span>
                            <ul class="nav">
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fas fa-th"></i></button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#list"><i class="fas fa-bars"></i></button></li>
                            </ul>
                            <button class="btn btn-light btn-hover-primary collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFilter">
                                <i class="fas fa-filter"></i>
                                Filters
                            </button>
                        </div>

                    </div>

                </div>
                <!-- Archive Filter Bars End -->

                <!-- Filter Collapse Start -->
                <div class="filter-collapse collapse" id="collapseFilter">
                    <div class="card card-body">
                        <div class="row row-cols-xl-5 gy-6">
                            
                            <div class="col-xl col-lg-3 col-md-4 col-sm-6">

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title">Categories</h4>

                                    <!-- Widget Filter Wrapper Start -->
                              <div class="header-category-dropdown bg-light p-3 rounded">
    <p class="mb-2">
        <a href="{{ route('CourseGrid') }}" class="d-block text-decoration-none fw-bold text-primary">
            All
        </a>
    </p>

    @foreach($navCategories as $cat)
        <p class="mb-2">
            <a href="{{ route('CourseGrid', ['category' => $cat->slug]) }}" class="d-block text-decoration-none text-dark">
                {{ $cat->name }}
            </a>
        </p>
    @endforeach
</div>

                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- Filter Collapse End -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="grid">

                       <div class="row gy-6">
    @forelse ($courses as $course)
        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 d-flex">   {{-- one column per card --}}
            <div class="course-item-02 w-100" data-aos="fade-up" data-aos-duration="1000">

                {{-- Thumbnail --}}
                <div class="course-header">
                    <div class="course-header__thumbnail rounded-0">
                        <a href="{{ route('CourseDetail', ['slug' => $course->slug]) }}">
                            <img
                                class="img-fluid w-100"
                                src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : asset('assets/images/courses/courses-2.jpg') }}"
                                alt="{{ $course->title }}">
                        </a>
                    </div>
                </div>

                {{-- Info --}}
                <div class="course-info-02">
                    {{-- Level --}}
                    <span class="course-info-02__badge-text badge-all">
                        {{ $course->level ?? 'All Levels' }}
                    </span>

                    {{-- Category --}}
                    <div class="course-info-02__category">
                        @if($course->category)
                            <a href="{{ route('CourseGrid', ['category' => $course->category->slug]) }}">
                                {{ $course->category->name }}
                            </a>
                        @else
                            <span>Uncategorized</span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="course-info-02__title">
                        <a href="{{ route('CourseDetail', ['slug' => $course->slug]) }}">
                            {{ $course->title }}
                        </a>
                    </h3>

                    {{-- Description --}}
                    <div class="course-info-02__description">
                        <p>
                            {{ $course->short_description ?? \Illuminate\Support\Str::limit($course->description, 90) }}
                        </p>
                    </div>

                    {{-- Price --}}
                    <div class="course-info-02__price">
                        @if($course->is_free)
                            <span class="sale-price">Free</span>
                        @else
                            @php $final = $course->discount_price ?? $course->price; @endphp
                            <span class="sale-price">${{ number_format($final, 2) }}</span>
                            @if($course->compare_at_price && $course->compare_at_price > $final)
                                <span class="regular-price">
                                    <del>${{ number_format($course->compare_at_price, 2) }}</del>
                                </span>
                            @endif
                        @endif
                    </div>

                    {{-- Rating --}}
                    <div class="course-info-02__rating">
                        <div class="rating-star">
                            <div class="rating-label" style="width: {{ (int)($course->rating_avg * 20) }}%;"></div>
                        </div>
                        <span>({{ $course->rating_count ?? 0 }})</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted py-5">No courses found.</div>
    @endforelse
</div>



                        </div>

                    </div>
                    <div class="tab-pane fade" id="list">

                        <!-- Course List Start -->
                      
                        <!-- Course List End -->

                        <!-- Course List Start -->
                      
                        <!-- Course List End -->

                    
                        <!-- Course List End -->

                        <!-- Course List Start -->
                        
                        <!-- Course List End -->

                    </div>
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
        <!-- Courses End -->

@endsection
