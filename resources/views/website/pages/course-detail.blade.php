@extends('website.layouts.main')
@section('content')


<!-- Page Banner Section Start -->
<div class="page-banner bg-color-11">
    <div class="page-banner__wrapper">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="course-grid-left-sidebar.html">courses</a></li>
                    <li class="breadcrumb-item active">Mastering Data Modeling Fundamentals</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu"
    style="background-image: url(assets/images/mobile-bg.jpg);">
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
                                            <a href="index.html" class="menu-content-list__link">Main Demo <span
                                                    class="badge hot">Hot</span></a>
                                            <a href="index-course-hub.html" class="menu-content-list__link">Course
                                                Hub</a>
                                            <a href="index-online-academy.html" class="menu-content-list__link">Online
                                                Academy <span class="badge hot">Hot</span></a>
                                            <a href="index-university.html"
                                                class="menu-content-list__link">University</a>
                                            <a href="index-education-center.html"
                                                class="menu-content-list__link">Education Center <span
                                                    class="badge hot">Hot</span></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="menu-content-list">
                                            <a href="index-language-academic.html"
                                                class="menu-content-list__link">Language Academic</a>
                                            <a href="index-single-instructor.html"
                                                class="menu-content-list__link">Single Instructor</a>
                                            <a href="index-dev.html" class="menu-content-list__link">Dev <span
                                                    class="badge new">New</span></a>
                                            <a href="index-online-art.html" class="menu-content-list__link">Online Art
                                                <span class="badge new">New</span></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="menu-content-banner"
                                            style="background-image: url(assets/images/home-megamenu-bg.jpg);">
                                            <h4 class="menu-content-banner__title">Achieve Your Goals With EduMall</h4>
                                            <a href="#"
                                                class="menu-content-banner__btn btn btn-primary btn-hover-secondary">Purchase
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Mega Menu Content Start -->
                        </li>
                    </ul>




                </li>
                <li>
                    <a href="#"><span>Courses</span></a>
                    <ul class="sub-menu">
                        <li><a href="course-grid-01.html"><span>Grid Basic Layout</span></a></li>
                        <li><a href="course-grid-02.html"><span>Grid Modern Layout</span></a></li>
                        <li><a href="course-grid-left-sidebar.html"><span>Grid Left Sidebar</span></a></li>
                        <li><a href="course-grid-right-sidebar.html"><span>Grid Right Sidebar</span></a></li>
                        <li><a href="course-list.html"><span>List Basic Layout</span></a></li>
                        <li><a href="course-list-left-sidebar.html"><span>List Left Sidebar</span></a></li>
                        <li><a href="course-list-right-sidebar.html"><span>List Right Sidebar</span></a></li>
                        <li><a href="course-category.html"><span>Category Page</span></a></li>
                        <li>
                            <a href="#"><span>Single Layout</span></a>
                            <ul class="sub-menu">
                                <li><a href="course-single-layout-01.html"><span>Layout 01</span></a></li>
                                <li><a href="course-single-layout-02.html"><span>Layout 02</span></a></li>
                                <li><a href="course-single-layout-03.html"><span>Layout 03</span></a></li>
                                <li><a href="course-single-layout-04.html"><span>Layout 04</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Blog</span></a>
                    <ul class="sub-menu">
                        <li><a href="blog-grid-01.html"><span>Grid Basic Layout</span></a></li>
                        <li><a href="blog-grid-02.html"><span>Grid Wide</span></a></li>
                        <li><a href="blog-grid-left-sidebar.html"><span>Grid Left Sidebar</span></a></li>
                        <li><a href="blog-grid-right-sidebar.html"><span>Grid Right Sidebar</span></a></li>
                        <li><a href="blog-list-style-01.html"><span>List Layout 01</span></a></li>
                        <li><a href="blog-list-style-02.html"><span>List Layout 02</span></a></li>
                        <li>
                            <a href="#"><span>Single Layouts</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog-details-left-sidebar.html"><span>Left Sidebar</span></a></li>
                                <li><a href="blog-details-right-sidebar.html"><span>Right Sidebar</span></a></li>
                                <li><a href="blog-details.html"><span>No Sidebar</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Pages</span></a>
                    <ul class="sub-menu">
                        <li><a href="become-an-instructor.html"><span>Become an Instructor</span></a></li>
                        <li>
                            <a href="instructors.html"><span>Instructor</span></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-my-courses.html"><span>My Courses</span></a></li>
                                <li><a href="dashboard-announcement.html"><span>Announcements</span></a></li>
                                <li><a href="dashboard-withdraw.html"><span>Withdrawals</span></a></li>
                                <li><a href="dashboard-quiz-attempts.html"><span>Quiz Attempts</span></a></li>
                                <li><a href="dashboard-question-answer.html"><span>Question & Answer</span></a></li>
                                <li><a href="dashboard-assignments.html"><span>Assignments</span></a></li>
                                <li><a href="dashboard-students.html"><span>My Students</span></a></li>
                            </ul>
                        </li>
                        <li><a href="about.html"><span>About us</span></a></li>
                        <li><a href="about-02.html"><span>About us 02</span></a></li>
                        <li><a href="contact-us.html"><span>Contact us</span></a></li>
                        <li><a href="contact-us-02.html"><span>Contact us 02</span></a></li>
                        <li><a href="membership-plans.html"><span>Membership plans</span></a></li>
                        <li><a href="faqs.html"><span>FAQs</span></a></li>
                        <li><a href="404-page.html"><span>404 Page</span></a></li>
                        <li>
                            <a href="#"><span>Dashboard</span></a>
                            <ul class="sub-menu">
                                <li><a href="dashboard-index.html"><span>Dashboard</span></a></li>
                                <li><a href="dashboard-student-index.html"><span>Dashboard Student</span></a></li>
                                <li><a href="dashboard-profile.html"><span>My Profile</span></a></li>
                                <li><a href="dashboard-all-course.html"><span>Enrolled Courses</span></a></li>
                                <li><a href="dashboard-wishlist.html"><span>Wishlist</span></a></li>
                                <li><a href="dashboard-reviews.html"><span>Reviews</span></a></li>
                                <li><a href="dashboard-my-quiz-attempts.html"><span>My Quiz Attempts</span></a></li>
                                <li><a href="dashboard-purchase-history.html"><span>Purchase History</span></a></li>
                                <li><a href="dashboard-settings.html"><span>Settings</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Features</span></a>
                    <ul class="sub-menu">
                        <li><a href="#"><span>Events</span></a>
                            <ul class="sub-menu">
                                <li><a href="event-grid-sidebar.html"><span>Event Listing 01</span></a></li>
                                <li><a href="event-grid.html"><span>Event Listing 02</span></a></li>
                                <li><a href="event-list.html"><span>Event Listing 03</span></a></li>
                                <li><a href="event-list-sidebar.html"><span>Event Listing 04</span></a></li>
                                <li>
                                    <a href="#"><span>Single Layouts</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="event-details-layout-01.html"><span>Layout 01</span></a></li>
                                        <li><a href="event-details-layout-02.html"><span>Layout 02</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Shop</span></a>
                            <ul class="sub-menu">
                                <li><a href="shop-default.html"><span>Shop – Default</span></a></li>
                                <li><a href="shop-left-sidebar.html"><span>Shop – Left Sidebar</span></a></li>
                                <li><a href="shop-right-sidebar.html"><span>Shop – Right Sidebar</span></a></li>
                                <li><a href="my-account.html"><span>My account</span></a></li>
                                <li><a href="wishlist.html"><span>Wishlist</span></a></li>
                                <li><a href="cart.html"><span>Cart</span></a></li>
                                <li><a href="cart-empty.html"><span>Cart Empty</span></a></li>
                                <li><a href="checkout.html"><span>Checkout</span></a></li>
                                <li>
                                    <a href="#"><span>Single Layouts</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-single-list-left-sidebar.html"><span>List – Left
                                                    Sidebar</span></a></li>
                                        <li><a href="shop-single-list-right-sidebar.html"><span>List – Right
                                                    Sidebar</span></a></li>
                                        <li><a href="shop-single-list-no-sidebar.html"><span>List – No
                                                    Sidebar</span></a></li>
                                        <li><a href="shop-single-tab-left-sidebar.html"><span>Tabs – Left
                                                    Sidebar</span></a></li>
                                        <li><a href="shop-single-tab-right-sidebar.html"><span>Tabs – Right
                                                    Sidebar</span></a></li>
                                        <li><a href="shop-single-tab-no-sidebar.html"><span>Tabs – No
                                                    Sidebar</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="zoom-meetings.html"><span>Zoom Meetings</span></a></li>
                        <li><a href="zoom-meetings-single.html"><span>Zoom Meeting Single</span></a></li>
                    </ul>
                </li>

















            </ul>
        </nav>
    </div>

    <!-- Header User Button Start -->
    <div class="offcanvas-user d-lg-none">
        <div class="offcanvas-user__button">
            <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal"
                data-bs-target="#loginModal">Log In</button>
        </div>
        <div class="offcanvas-user__button">
            <button class="offcanvas-user__signup btn btn-primary btn-hover-primary" data-bs-toggle="modal"
                data-bs-target="#registerModal">Sign Up</button>
        </div>
    </div>
    <!-- Header User Button End -->

</div>
<!-- Offcanvas End -->

<!-- Tutor Course Top Info Start -->
<div class="tutor-course-top-info section-padding-01 bg-color-11">
    <div class="container custom-container">

        <div class="row">
            <div class="col-lg-8">

                <!-- Tutor Course Top Info Start -->
                @php
                // ---- Discount ----
                $discountPercent = null;
                if (
                !empty($course->compare_at_price) &&
                !empty($course->price) &&
                $course->compare_at_price > $course->price
                ) {
                $discountPercent = round(
                (($course->compare_at_price - $course->price) / $course->compare_at_price) * 100,
                );
                }

                // ---- Rating ----
                $rating = (float) ($course->rating_avg ?? 0);
                $rating = max(0, min(5, $rating));
                $full = floor($rating);
                $fraction = $rating - $full;
                $half = $fraction >= 0.75 ? 0 : ($fraction >= 0.25 ? 1 : 0);
                if ($fraction >= 0.75) {
                $full++;
                }
                $empty = 5 - $full - $half;

                // ---- Teacher name + avatar from teacher_detail ----
                $td = $course->teacher->teacherDetail ?? null;
                $teacherName = $td ? trim(($td->first_name ?? '') . ' ' . ($td->last_name ?? '')) : 'Teacher';
                if ($teacherName === '') {
                $teacherName = 'Teacher';
                }

                $teacherAvatar =
                $td && !empty($td->profile_image)
                ? asset('storage/' . $td->profile_image)
                : asset('assets/images/instructor/instructor-01.jpg');
                @endphp

                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

                <style>
                    .teacher-chip img {
                        width: 36px;
                        height: 36px;
                        border-radius: 50%;
                        object-fit: cover;
                        display: block;
                    }

                    .teacher-chip .name {
                        font-weight: 700;
                    }

                    .course-rating .rating-stars i {
                        font-size: 16px;
                        vertical-align: -2px;
                        color: #f6b100;
                    }

                    .course-rating .rating-count {
                        color: #6c757d;
                        font-size: .95rem;
                    }
                </style>

                <div class="container custom-container">
                    <div class="row">
                        <div class="col-lg-8">

                            {{-- Badges: Discount + Category --}}
                            <div class="tutor-course-top-info__badges mb-2">
                                @if ($discountPercent)
                                <span class="onsale">-{{ $discountPercent }}%</span>
                                @endif
                                @if (!empty($course->subject))
                                <a class="badges-category" href="#">{{ $course->subject }}</a>
                                @endif
                            </div>

                            {{-- Title --}}
                            <h1 class="tutor-course-top-info__title mb-3">
                                {{ $course->title }}
                            </h1>

                            {{-- Teacher (image + name only) + Last Update --}}
                            <div class="tutor-course-top-info__meta d-flex align-items-center mb-3" style="gap:18px;">
                                <div class="tutor-course-top-info__meta-instructor d-flex align-items-center teacher-chip"
                                    style="gap:10px;">
                                    <img src="{{ $teacherAvatar }}" alt="{{ $teacherName }}">
                                    <div class="name">{{ $teacherName }}</div>
                                </div>

                                <div class="tutor-course-top-info__meta-update text-muted">
                                    Last Update
                                    {{ optional($course->updated_at ?? $course->published_at)->format('F j, Y') }}
                                </div>
                            </div>

                            {{-- Rating + Enrolled Count --}}
                            <div class="tutor-course-top-info__meta d-flex align-items-center mb-4" style="gap:18px;">
                                <div class="course-rating d-flex align-items-center" style="gap:8px;">
                                    <div class="rating-average">
                                        <strong>{{ number_format($rating, 2) }}</strong><span class="text-muted">
                                            /5</span>
                                    </div>
                                    <div class="rating-stars">
                                        @for ($i = 0; $i < $full; $i++) <i class="fas fa-star"></i>
                                            @endfor
                                            @if ($half)
                                            <i class="fas fa-star-half-alt"></i>
                                            @endif
                                            @for ($i = 0; $i < $empty; $i++) <i class="far fa-star"></i>
                                                @endfor
                                    </div>
                                    <div class="rating-count">({{ $course->rating_count ?? 0 }})</div>
                                </div>

                                <div class="tutor-course-top-info__meta-action text-muted">
                                    <i class="meta-icon fas fa-user-alt"></i>
                                    {{ $course->enrolled_count ?? 0 }} already enrolled
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Tutor Course Top Info End -->

            </div>
        </div>

    </div>
</div>
<!-- Tutor Course Top Info End -->

<!-- Tutor Course Main content Start -->
<div class="tutor-course-main-content section-padding-01 sticky-parent">
    <div class="container custom-container">

        <div class="row gy-10">
            <div class="col-lg-8">

                <!-- Tutor Course Main Segment Start -->
                <div class="tutor-course-main-segment">

                    <!-- Tutor Course Segment Start -->
                    <div class="tutor-course-segment">
                        <h4 class="tutor-course-segment__title">Course Prerequisites</h4>

                        <!-- Tutor Course Segment Prerequisites Start -->
                        <div class="tutor-course-segment__prerequisites">
                            <div class="tutor-course-segment__prerequisites-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                                Please note that this course has the following prerequisites which must be completed
                                before it can be accessed
                            </div>
                            <ul class="tutor-course-segment__prerequisites-list">
                                <li>
                                    <a class="prerequisites-item"
                                        href="{{ route('CourseDetail', ['slug' => $course->slug]) }}">
                                        <div class="prerequisites-item__thumbnail">
                                            <img src="{{ $course->thumbnail
                                                    ? asset('storage/' . $course->thumbnail)
                                                    : asset('assets/images/courses/default-thumbnail.jpg') }}"
                                                alt="{{ $course->title }}" width="70" height="47">
                                        </div>
                                        <div class="prerequisites-item__title">
                                            {{ $course->title }}
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- Tutor Course Segment Prerequisites End -->

                    </div>
                    <!-- Tutor Course Segment End -->

                    <div class="tutor-course-segment">
                        <h4 class="tutor-course-segment__title">About This Course</h4>

                        <!-- Tutor Course Segment Content Wrapper Start -->
                        <div class="tutor-course-segment__content-wrap">
                            {!! nl2br(e($course->long_description)) !!}
                        </div>
                        <!-- Tutor Course Segment Content Wrapper End -->

                        @php
                        // --- Normalize TAGS to a flat array of strings ---
                        $tagsRaw = $course->tags ?? [];
                        if ($tagsRaw instanceof \Illuminate\Support\Collection) {
                        $tagsArr = $tagsRaw
                        ->map(fn($t) => is_array($t) ? $t['name'] ?? null : $t)
                        ->filter()
                        ->values()
                        ->all();
                        } elseif (is_array($tagsRaw)) {
                        $tagsArr = collect($tagsRaw)
                        ->map(fn($t) => is_array($t) ? $t['name'] ?? null : $t)
                        ->filter()
                        ->values()
                        ->all();
                        } elseif (is_string($tagsRaw)) {
                        $tagsArr = array_values(array_filter(array_map('trim', explode(',', $tagsRaw))));
                        } else {
                        $tagsArr = [];
                        }

                        // --- Normalize MATERIALS to a flat array of strings ---
                        $materialsRaw = $course->materials ?? [];
                        if ($materialsRaw instanceof \Illuminate\Support\Collection) {
                        $materialsArr = $materialsRaw
                        ->map(fn($m) => is_array($m) ? $m['name'] ?? null : $m)
                        ->filter()
                        ->values()
                        ->all();
                        } elseif (is_array($materialsRaw)) {
                        $materialsArr = collect($materialsRaw)
                        ->map(fn($m) => is_array($m) ? $m['name'] ?? null : $m)
                        ->filter()
                        ->values()
                        ->all();
                        } elseif (is_string($materialsRaw)) {
                        $materialsArr = array_values(
                        array_filter(array_map('trim', explode(',', $materialsRaw))),
                        );
                        } else {
                        $materialsArr = [];
                        }

                        // Merge into one “tags list” if you want both shown together
                        $showTags = count($tagsArr) || count($materialsArr);
                        @endphp

                        @if ($showTags)
                        <!-- Tutor Course Segment Tags Start -->
                        <div class="tutor-course-segment__tags">
                            <div class="tutor-course-segment__tags-title">
                                <i class="fas fa-tags"></i>
                            </div>
                            <div class="tutor-course-segment__tags-list">
                                {{-- Tags --}}
                                @foreach ($tagsArr as $i => $tag)
                                <a href="#">{{ $tag }}@if ($i < count($tagsArr) - 1 || count($materialsArr)> 0)
                                        ,
                                        @endif
                                </a>
                                @endforeach

                                {{-- Materials --}}
                                @foreach ($materialsArr as $j => $material)
                                <a href="#">{{ $material }}@if ($j < count($materialsArr) - 1) , @endif </a>
                                        @endforeach
                            </div>
                        </div>
                        <!-- Tutor Course Segment Tags End -->
                        @endif
                    </div>

                    <!-- Tutor Course Segment End -->

                    <!-- Tutor Course Segment Start -->
                    <div class="tutor-course-segment benefits-wrap">
                        <h4 class="tutor-course-segment__title">Learning Objectives</h4>

                        @php
                        // Normalize $course->what_you_will_learn to an array of strings
                        $raw = $course->what_you_will_learn ?? [];
                        if ($raw instanceof \Illuminate\Support\Collection) {
                        $learnItems = $raw
                        ->map(fn($v) => is_array($v) ? $v['text'] ?? ($v['name'] ?? null) : $v)
                        ->filter()
                        ->map(fn($v) => trim((string) $v))
                        ->values()
                        ->all();
                        } elseif (is_array($raw)) {
                        $learnItems = collect($raw)
                        ->map(fn($v) => is_array($v) ? $v['text'] ?? ($v['name'] ?? null) : $v)
                        ->filter()
                        ->map(fn($v) => trim((string) $v))
                        ->values()
                        ->all();
                        } elseif (is_string($raw)) {
                        $lines = preg_split('/\R+/', $raw); // split by newlines
                        if (count($lines) <= 1) { $lines=explode(',', $raw); } // fallback: commas
                            $learnItems=array_values(array_filter(array_map('trim', $lines))); } else { $learnItems=[];
                            } @endphp <!-- Tutor Course Segment Benefits Items Start -->
                            <div class="tutor-course-segment__benefits-items">
                                @forelse($learnItems as $text)
                                <div class="tutor-course-segment__benefit-item">
                                    <div class="tutor-course-segment__benefit-content">
                                        <i class="fas fa-check"></i>
                                        <span class="benefit-text">{{ $text }}</span>
                                    </div>
                                </div>
                                @empty
                                {{-- Optional: nothing to show --}}
                                @endforelse
                            </div>
                            <!-- Tutor Course Segment Benefits Items End -->

                            <!-- Tutor Course Segment Benefits Items End -->

                    </div>
                    <!-- Tutor Course Segment End -->

                    <!-- Tutor Course Segment Start -->
                    <div class="tutor-course-segment">
                        <h4 class="tutor-course-segment__title">Requirements</h4>

                        <!-- Tutor Course Segment Requirements Items Start -->
                        @php
                        // Normalize $course->requirements to an array of strings
                        $raw = $course->requirements ?? [];
                        if ($raw instanceof \Illuminate\Support\Collection) {
                        $requirements = $raw
                        ->map(fn($v) => is_array($v) ? $v['text'] ?? ($v['name'] ?? null) : $v)
                        ->filter()
                        ->map(fn($v) => trim((string) $v))
                        ->values()
                        ->all();
                        } elseif (is_array($raw)) {
                        $requirements = collect($raw)
                        ->map(fn($v) => is_array($v) ? $v['text'] ?? ($v['name'] ?? null) : $v)
                        ->filter()
                        ->map(fn($v) => trim((string) $v))
                        ->values()
                        ->all();
                        } elseif (is_string($raw)) {
                        $lines = preg_split('/\R+/', $raw); // split by newlines
                        if (count($lines) <= 1) { $lines=explode(',', $raw); } // fallback: commas
                            $requirements=array_values(array_filter(array_map('trim', $lines))); } else {
                            $requirements=[]; } @endphp <!-- Tutor Course Segment Requirements -->
                            <div class="tutor-course-segment">
                                <h4 class="tutor-course-segment__title">Course Requirements</h4>
                                <div class="tutor-course-segment__requirements-content">
                                    <ul class="tutor-course-segment__list-style-01">
                                        @forelse($requirements as $req)
                                        <li>{{ $req }}</li>
                                        @empty
                                        {{-- Optional: show message if no requirements --}}
                                        {{-- <li>No requirements for this course.</li> --}}
                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            <!-- Tutor Course Segment Requirements Items End -->
                    </div>
                    <!-- Tutor Course Segment End -->

                    <!-- Tutor Course Segment Start -->
                    <div class="tutor-course-segment audience-wrap">
                        <h4 class="tutor-course-segment__title">Target Audience</h4>

                        <!-- Tutor Course Segment Requirements Items Start -->
                        @php
                        // Normalize $course->who_is_for to an array of strings (supports string/array/collection)
                        $raw = $course->who_is_for ?? [];
                        if ($raw instanceof \Illuminate\Support\Collection) {
                        $audience = $raw
                        ->map(fn($v) => is_array($v) ? $v['text'] ?? ($v['name'] ?? null) : $v)
                        ->filter()
                        ->map(fn($v) => trim((string) $v))
                        ->values()
                        ->all();
                        } elseif (is_array($raw)) {
                        $audience = collect($raw)
                        ->map(fn($v) => is_array($v) ? $v['text'] ?? ($v['name'] ?? null) : $v)
                        ->filter()
                        ->map(fn($v) => trim((string) $v))
                        ->values()
                        ->all();
                        } elseif (is_string($raw)) {
                        // split by newlines first; fallback to commas
                        $lines = preg_split('/\R+/', $raw);
                        if (count($lines) <= 1) { $lines=explode(',', $raw); }
                            $audience=array_values(array_filter(array_map('trim', $lines))); } else { $audience=[]; }
                            @endphp <div class="tutor-course-segment__audience-content">
                            <ul class="tutor-course-segment__list-style-02">
                                @forelse($audience as $item)
                                <li>{{ $item }}</li>
                                @empty
                                {{-- Optional: show nothing or a fallback --}}
                                {{-- <li>No audience specified.</li> --}}
                                @endforelse
                            </ul>
                    </div>

                    <!-- Tutor Course Segment Requirements Items End -->
                </div>
                <!-- Tutor Course Segment End -->

                <!-- Tutor Course Segment Start -->

                <!-- Tutor Course Segment End -->

                <!-- Tutor Course Segment Start -->
                <div class="tutor-course-segment">


                    @php
                    $td = $course->teacher->teacherDetail ?? null;

                    // Teacher name (first + last) with fallback
                    $teacherName = trim(($td->first_name ?? '') . ' ' . ($td->last_name ?? ''));
                    if ($teacherName === '') {
                    $teacherName = $course->teacher->name ?? 'Teacher';
                    }

                    // Avatar (from teacher_detail->profile_image if present; else fallback)
                    $teacherAvatar =
                    $td && !empty($td->profile_image)
                    ? asset('storage/' . $td->profile_image)
                    : asset('assets/images/instructor/instructor-01.jpg');

                    // Rating percent for star bar
                    $instRating = (float) ($instructorRatingAvg ?? 0);
                    $instRatingPct = max(0, min(100, (int) round($instRating * 20)));
                    @endphp

                    {{-- Instructor card (drop-in) --}}
                    @php
                    $td = $course->teacher->teacherDetail ?? null;

                    // Name from teacher_details (fallbacks to user->name or "Teacher")
                    $teacherName = trim(($td->first_name ?? '') . ' ' . ($td->last_name ?? ''));
                    if ($teacherName === '') {
                    $teacherName = $course->teacher->name ?? 'Teacher';
                    }

                    // Avatar from teacher_details profile_image (storage), fallback to theme image
                    $teacherAvatar =
                    $td && !empty($td->profile_image)
                    ? asset('storage/' . $td->profile_image)
                    : asset('assets/images/instructor/instructor-01.jpg');

                    // Rating bar width from controller-provided average
                    $instRating = (float) ($instructorRatingAvg ?? 0);
                    $instRatingPct = max(0, min(100, (int) round($instRating * 20)));
                    @endphp

                    <div class="tutor-course-segment">
                        <h4 class="tutor-course-segment__title">Your Instructors</h4>

                        <div class="tutor-course-segment__instructor">
                            <div class="tutor-instructor">
                                <div class="tutor-instructor__avatar">
                                    <img src="{{ $teacherAvatar }}" alt="instructor" width="200" height="246">
                                </div>

                                <div class="tutor-instructor__instructor-info">
                                    <h4 class="tutor-instructor__name">{{ $teacherName }}</h4>

                                    <div class="tutor-instructor__ratings">
                                        <div class="rating-star">
                                            <div class="rating-label" style="width: {{ $instRatingPct }}%;">
                                            </div>
                                        </div>
                                        <div class="rating-average">
                                            <span class="rating-average__average">{{ number_format($instRating, 2)
                                                }}</span>
                                            <span class="rating-average__total">/5</span>
                                        </div>
                                    </div>

                                    <div class="tutor-instructor__meta">
                                        <span><i class="fas fa-play-circle"></i> {{ $teacherCoursesCount ?? 0 }}
                                            Courses</span>
                                        <span><i class="fas fa-comment-alt"></i> {{ $teacherReviewsCount ?? 0 }}
                                            Reviews</span>
                                        <span><i class="fas fa-user"></i> {{ $teacherStudentsCount ?? 0 }}
                                            Students</span>
                                    </div>



                                    <a class="tutor-instructor__link" href="#"><i class="fas fa-plus"></i>
                                        See more</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Tutor Course Segment End -->

                <!-- Tutor Course Segment Start -->
                <div class="tutor-course-segment">
                    <h4 class="tutor-course-segment__title">Student Feedback</h4>

                    <div class="tutor-course-segment__feedback">
                        <div class="tutor-course-segment__reviews-average">
                            <div class="count">4.4</div>
                            <div class="reviews-rating-star">
                                <div class="rating-star">
                                    <div class="rating-label" style="width: 90%;"></div>
                                </div>
                            </div>
                            <div class="rating-total">8 Ratings</div>
                        </div>
                        <div class="tutor-course-segment__reviews-metar">

                            <div class="course-rating-metar">
                                <div class="rating-metar-star">
                                    <div class="rating-star">
                                        <div class="rating-label" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-col">
                                    <div class="rating-metar-bar">
                                        <div class="rating-metar-line" style="width: 75%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-text">75%</div>
                            </div>

                            <div class="course-rating-metar">
                                <div class="rating-metar-star">
                                    <div class="rating-star">
                                        <div class="rating-label" style="width: 80%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-col">
                                    <div class="rating-metar-bar">
                                        <div class="rating-metar-line" style="width: 13%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-text">13%</div>
                            </div>

                            <div class="course-rating-metar">
                                <div class="rating-metar-star">
                                    <div class="rating-star">
                                        <div class="rating-label" style="width: 60%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-col">
                                    <div class="rating-metar-bar">
                                        <div class="rating-metar-line" style="width: 0%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-text">0%</div>
                            </div>

                            <div class="course-rating-metar">
                                <div class="rating-metar-star">
                                    <div class="rating-star">
                                        <div class="rating-label" style="width: 40%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-col">
                                    <div class="rating-metar-bar">
                                        <div class="rating-metar-line" style="width: 0%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-text">0%</div>
                            </div>

                            <div class="course-rating-metar">
                                <div class="rating-metar-star">
                                    <div class="rating-star">
                                        <div class="rating-label" style="width: 20%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-col">
                                    <div class="rating-metar-bar">
                                        <div class="rating-metar-line" style="width: 13%;"></div>
                                    </div>
                                </div>
                                <div class="rating-metar-text">13%</div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Tutor Course Segment End -->

                <!-- Tutor Course Segment Start -->
                <div class="tutor-course-segment">
                    {{-- <h4 class="tutor-course-segment__title">Reviews <span class="count">(3)</span></h4> --}}

                    <div class="tutor-course-segment__review-commnet">
                        <ul class="comment-list-02">
                     <h3>Student Reviews ({{ $totalRatings }})</h3>

<ul class="comment-list">
   @forelse($approvedReviews as $review)
    @php
        $u  = $review->user ?? null;
        $sd = $u?->studentDetail;

        // Try (in order): user.avatar, user.profile_photo_path, studentDetail.profile_image
        $raw = $u->avatar ?? $u->profile_photo_path ?? $sd?->profile_image ?? null;

        // Normalize to a real URL (works whether you saved in /public/uploads/... or storage/app/public/uploads/...)
        $avatar = null;
        if ($raw) {
            $p = ltrim($raw, '/');
            if (preg_match('#^https?://#', $p)) {
                $avatar = $p;
            } elseif (file_exists(public_path($p))) {
                $avatar = asset($p);                       // e.g. "uploads/students/xxxx.jpg"
            } elseif (file_exists(public_path('storage/'.$p))) {
                $avatar = asset('storage/'.$p);            // e.g. "uploads/students/xxxx.jpg" stored on public disk
            }
        }
        // Final fallback
        $avatar = $avatar ?? asset('assets/admin/images/avatar/student-default.png');
    @endphp

    <li>
        <div class="comment-item-02">
            <div class="comment-item-02__header">
                <div class="comment-item-02__author">
                    <img src="{{ $avatar }}" alt="Avatar" width="52" height="52" class="rounded-circle">
                </div>
                <div class="comment-item-02__info">
                    <h6 class="comment-item-02__name">
                        <a href="#">{{ $u?->full_name ?? 'Anonymous' }}</a>
                    </h6>
                    <p class="comment-item-02__date">{{ $review->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="comment-item-02__body">
                <div class="rating-star">
                    <div class="rating-label" style="width: {{ max(0,min(5,(int)$review->rating)) * 20 }}%;"></div>
                </div>
                <p>{{ $review->comment }}</p>
            </div>
        </div>
    </li>
@empty
    <li>No reviews yet.</li>
@endforelse

</ul>







                        </ul>
                    </div>
                </div>
                <!-- Tutor Course Segment End -->

                <!-- Tutor Course Segment Start -->
                <div class="tutor-course-segment">
                    <h4 class="tutor-course-segment__title">Write a review</h4>

                    <div class="tutor-course-segment__reviews">
                        <button class="tutor-course-segment__btn btn btn-primary btn-hover-secondary"
                            data-bs-toggle="collapse" data-bs-target="#collapseForm">Write a review</button>

                        <div class="collapse" id="collapseForm">
                            <!-- Comment Form Start -->
                            <div class="comment-form">
                                @php
                                // If the user already reviewed, we'll prefill (works with updateOrCreate in controller)
                                $myReview = auth()->check()
                                ? $course
                                ->reviews()
                                ->where('user_id', auth()->id())
                                ->first()
                                : null;
                                @endphp

                                @auth
                                <form method="POST" action="{{ route('reviews.store', $course->id) }}">
                                    @csrf

                                    {{-- Rating (pure HTML radios, no JS) --}}
                                    <div class="comment-form__rating mb-3">
                                        <label class="label d-block mb-1">Your rating: *</label>
                                        <div class="d-flex gap-3">
                                            @for ($i = 1; $i <= 5; $i++) <label class="d-inline-flex align-items-center"
                                                style="cursor:pointer;">
                                                <input type="radio" name="rating" value="{{ $i }}" class="me-1" {{ (int)
                                                    old('rating', $myReview->rating ?? 0) === $i ? 'checked' : '' }}
                                                required>
                                                {{ $i }}★
                                                </label>
                                                @endfor
                                        </div>
                                        @error('rating')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row gy-4">
                                        {{-- Optional title --}}
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Review title (optional)"
                                                    value="{{ old('title', $myReview->title ?? '') }}">
                                            </div>
                                        </div>

                                        {{-- Comment --}}
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <textarea name="comment" class="form-control" rows="4"
                                                    placeholder="Your comment (optional)">{{ old('comment', $myReview->comment ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        {{-- You don’t need name/email fields for logged-in users --}}
                                        {{-- If you want to show them read-only: --}}
                                        {{-- <div class="col-md-6"><input class="form-control"
                                                value="{{ auth()->user()->name }}" disabled></div>
                                        <div class="col-md-6"><input class="form-control"
                                                value="{{ auth()->user()->email }}" disabled></div> --}}

                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <button class="btn btn-primary btn-hover-secondary">
                                                    {{ $myReview ? 'Update Review' : 'Submit Review' }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <div class="alert alert-light border">
                                    Please <a href="{{ route('login') }}">log in</a> to write a review.
                                </div>
                                @endauth

                            </div>
                            <!-- Comment Form End -->
                        </div>
                    </div>
                </div>
                <!-- Tutor Course Segment End -->

            </div>
            <!-- Tutor Course Main Segment End -->

        </div>
        <div class="col-lg-4">

            <div class="sidebar-sticky">
                <!-- Tutor Course Sidebar Start -->
                <div class="tutor-course-sidebar">

                    <!-- Tutor Course Price Preview Start -->
                    <div class="tutor-course-price-preview">
                        <div class="tutor-course-price-preview__thumbnail">
                            <div class="tutor-course-price-preview__thumbnail">
                                @php
                                $u = $course->promo_video_url ?? ''; $e = null;
                                if ($u) {
                                if (preg_match('~youtu\.be/([^?&/]+)|v=([^?&/]+)|/shorts/([^?&/]+)~', $u, $m)) {
                                $e = 'https://www.youtube.com/embed/'.($m[1] ?? $m[2] ?? $m[3]);
                                } elseif (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $u, $m)) {
                                $e = "https://player.vimeo.com/video/{$m[1]}";
                                }
                                }
                                @endphp

                                <div class="ratio ratio-16x9">
                                    @if($e)
                                    <iframe src="{{ $e }}" class="w-100 h-100" style="border:0"
                                        allowfullscreen></iframe>
                                    @else
                                    <img src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : asset('assets/images/courses/default-thumbnail.jpg') }}"
                                        class="w-100 h-100" style="object-fit:cover" alt="{{ $course->title }}">
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="tutor-course-price-preview__price">
                           <div class="tutor-course-price">
    <span class="sale-price">
        {{ rtrim(rtrim(number_format($course->discount_price, 2, '.', ''), '0'), '.') }}
    </span>
    <span class="regular-price">
        {{ rtrim(rtrim(number_format($course->price, 2, '.', ''), '0'), '.') }}
    </span>
</div>

<div class="tutor-course-price-badge">
    {{ rtrim(rtrim(number_format($course->discount_percentage, 2, '.', ''), '0'), '.') }}%
</div>

                        </div>
                        <div class="tutor-course-price-preview__meta">
                            <ul class="tutor-course-meta-list">
                                <li>
                                    <div class="label"><i class="fas fa-sliders-h"></i> Level </div>
                                    <div class="value">{{ $course->level }}</div>
                                </li>
                                <li>
                                    <div class="label"><i class="fas fa-clock"></i> Duration </div>
                                    <div class="value">{{ $course->total_duration_minutes }}</div>
                                </li>
                                <li>
                                    <div class="label"><i class="fas fa-play-circle"></i> Lectures </div>
                                    <div class="value">{{ $course->total_lessons }}</div>
                                </li>
                                <li>
                                    <div class="label"><i class="fas fa-tag"></i> Subject </div>
                                    <div class="value"><a href="#">{{ $course->title }}</a></div>
                                </li>
                                <li>
                                    <div class="label"><i class="fas fa-globe"></i> Language </div>
                                    <div class="value">{{ $course->language }}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="tutor-course-segment">
                            <h4 class="tutor-course-segment__title">Material Includes</h4>

                            <ul class="tutor-course-segment__list-style-01">
                                <li>Videos</li>
                                <li>Booklets</li>
                            </ul>
                        </div>
                        <div class="tutor-course-price-preview__btn">
                            <form method="POST" action="{{ route('cart.add', $course) }}">
                                @csrf
                                <button class="btn btn-outline-primary w-100">Add to Cart</button>
                            </form>
                        </div>
                        <div class="tutor-course-price-preview__social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-tumblr"></i></a>
                        </div>
                    </div>
                    <!-- Tutor Course Price Preview End -->

                    <!-- Sidebar Widget Start -->
                    @foreach ($section as $section)
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget__title">Course categories</h3>

                        <ul class="sidebar-widget__link">
                            <li><a href="#">{{ $section->title }}</a></li>

                        </ul>
                    </div>
                    @endforeach
                    <!-- Sidebar Widget End -->

                    <!-- Sidebar Widget Start -->

                    <!-- Sidebar Widget End -->

                </div>
                <!-- Tutor Course Sidebar End -->
            </div>

        </div>
    </div>

</div>
</div>
<!-- Tutor Course Main content End -->



@endsection
