@extends('website.layouts.main')
@section('content')

        <!-- Page Banner Section Start -->
        <div class="page-banner bg-color-04">
            <div class="page-banner__wrapper">

                <div class="page-banner__shape-01"></div>
                <div class="page-banner__shape-02"></div>
                <div class="page-banner__shape-03"></div>

                <div class="container">

                    <!-- Page Breadcrumb Start -->
                    <div class="page-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="course-grid-left-sidebar.html">Courses</a></li>
                            <li class="breadcrumb-item active">Art & Design</li>
                        </ul>
                    </div>
                    <!-- Page Breadcrumb End -->

                    <!-- Page Banner Caption Start -->
                    <div class="page-banner__caption-02">
                        <h2 class="page-banner__main-title-02">Art & Design Courses</h2>
                    </div>
                    <!-- Page Banner Caption End -->

                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

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
                                                <li><a href="shop-single-list-left-sidebar.html"><span>List – Left Sidebar</span></a></li>
                                                <li><a href="shop-single-list-right-sidebar.html"><span>List – Right Sidebar</span></a></li>
                                                <li><a href="shop-single-list-no-sidebar.html"><span>List – No Sidebar</span></a></li>
                                                <li><a href="shop-single-tab-left-sidebar.html"><span>Tabs – Left Sidebar</span></a></li>
                                                <li><a href="shop-single-tab-right-sidebar.html"><span>Tabs – Right Sidebar</span></a></li>
                                                <li><a href="shop-single-tab-no-sidebar.html"><span>Tabs – No Sidebar</span></a></li>
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
                    <button class="offcanvas-user__login btn btn-secondary btn-hover-secondarys" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
                </div>
                <div class="offcanvas-user__button">
                    <button class="offcanvas-user__signup btn btn-primary btn-hover-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
                </div>
            </div>
            <!-- Header User Button End -->

        </div>
        <!-- Offcanvas End -->

        <!-- Courses Category Start -->
        <div class="courses-category-section section-padding-02">
            <div class="container">

                <!-- Courses Tabs Menu Start -->
                <div class="courses-tab-menu-03">
                    <ul class="nav">
                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#popular">Most <mark>popular</mark></button></li>
                        <li><button data-bs-toggle="tab" data-bs-target="#trending">Trending</button></li>
                    </ul>
                </div>
                <!-- Courses Tabs Menu End -->

                <div class="tab-content course-tab-active swiper-button-style swiper-dots-style">
                    <div class="tab-pane fade show active" id="popular">

                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-1.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Successful Negotiation: Master Your Negotiating Skills</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$39.<small class="separator">00</small></span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-2.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Time Management Mastery: Do More, Stress Less</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$29.<small class="separator">99</small></span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-3.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Angular – The Complete Guide (2020 Edition)</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$49.<small class="separator">99</small></span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-4.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Consulting Approach to Problem Solving</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-5.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">The Business Intelligence Analyst Course 2020</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-6.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Become a Product Manager | Learn the Skills & Get the Job</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-7.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Mechanical Engineering and Electrical Engineering Explained</a></h3>
                                            <a href="#" class="course-info__instructor">Oliver Porter</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$84.<small class="separator">00</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-8.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Learn Algebra The Easy Way!</a></h3>
                                            <a href="#" class="course-info__instructor">Oliver Porter</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$45.<small class="separator">00</small></span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-9.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Essential Digital Tools for Student Engagement</a></h3>
                                            <a href="#" class="course-info__instructor">Donald Logan</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-10.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Adobe Lightroom For Beginners : Complete Photo/Image Editing</a></h3>
                                            <a href="#" class="course-info__instructor">Alex Itzel</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="trending">

                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-13.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="hot">Featured</span>
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Adobe Illustrator CC – Essentials Training Course</a></h3>
                                            <a href="#" class="course-info__instructor">Owen Christ</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-4.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Consulting Approach to Problem Solving</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-14.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Time Management for Professional Productivity</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-9.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Essential Digital Tools for Student Engagement</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-8.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">The Business Intelligence Analyst Course 2020</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-15.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-intermediate">Intermediate</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Become a Product Manager | Learn the Skills & Get the Job</a></h3>
                                            <a href="#" class="course-info__instructor">Donald Logan</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 80%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-16.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-beginner">Beginner</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Introduction to Web Development</a></h3>
                                            <a href="#" class="course-info__instructor">Oliver Porter</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail">
                                                <a href="#"><img src="assets/images/courses/courses-17.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="onsale">-100%</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Analytic Techniques for Business Specialization</a></h3>
                                            <a href="#" class="course-info__instructor">Oliver Porter</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$00.<small class="separator">00</small></span>
                                                <span class="regular-price">$39.<small class="separator">00</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-18.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">How To Sing #1: Complete Vocal Warm ups & Voice Physiology</a></h3>
                                            <a href="#" class="course-info__instructor">Emilee Logan</a>
                                            <div class="course-info__price">
                                                <span class="sale-price">$19.<small class="separator">99</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                                <div class="swiper-slide">

                                    <!-- Course Start -->
                                    <div class="course-item">
                                        <div class="course-header">
                                            <div class="course-header__thumbnail ">
                                                <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-6.jpg" alt="courses" width="258" height="173"></a>
                                            </div>
                                            <div class="course-header__badge">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                        <div class="course-info">
                                            <span class="course-info__badge-text badge-all">All Levels</span>
                                            <h3 class="course-info__title"><a href="course-single-layout-01.html">Become a Product Manager | Learn the Skills & Get the Job</a></h3>
                                            <a href="#" class="course-info__instructor">parra</a>
                                            <div class="course-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <span>(2)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course End -->

                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                    <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>
                </div>

            </div>
        </div>
        <!-- Courses Category End -->

        <!-- Courses Category Featured Start -->
        <div class="courses-category-section section-padding-02">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="section-title__title"><mark>Featured</mark> Courses</h2>
                </div>
                <!-- Section Title End -->

                <div class="row gy-6">
                    <div class="col-xl-3 col-md-6">

                        <!-- Course Start -->
                        <div class="course-item-03">
                            <div class="course-header-03">
                                <div class="course-header-03__thumbnail ">
                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-22.jpg" alt="courses" width="330" height="221"></a>
                                </div>
                                <div class="course-header-03__badge">
                                    <span class="hot">Featured</span>
                                </div>
                            </div>
                            <div class="course-info-03">
                                <h3 class="course-info-03__title"><a href="course-single-layout-01.html">The Complete Graphic Design Theory for Beginners Course</a></h3>
                                <div class="course-info-03__meta">
                                    <span>5 Lessons</span>
                                    <span>2.3 hours</span>
                                    <span>Intermediate</span>
                                </div>
                                <div class="course-info-03__description">
                                    <p>Even if you’re a complete beginner, this course will show …</p>
                                </div>
                                <div class="course-info-03__footer">

                                    <div class="course-info-03__footer-left">
                                        <a class="course-info-03__instructor" href="#">Donald Logan</a>
                                    </div>
                                    <div class="course-info-03__footer-right">
                                        <div class="course-info-03__price">
                                            <span class="sale-price">$45.<small class="separator">00</small></span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!-- Course End -->

                    </div>
                    <div class="col-xl-3 col-md-6">

                        <!-- Course Start -->
                        <div class="course-item-03">
                            <div class="course-header-03">
                                <div class="course-header-03__thumbnail ">
                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-23.jpg" alt="courses" width="330" height="221"></a>
                                </div>
                                <div class="course-header-03__badge">
                                    <span class="hot">Featured</span>
                                </div>
                            </div>
                            <div class="course-info-03">
                                <h3 class="course-info-03__title"><a href="course-single-layout-01.html">Graphic Design Bootcamp: Photoshop, Illustrator, InDesign</a></h3>
                                <div class="course-info-03__meta">
                                    <span>4 Lessons</span>
                                    <span>19 hours</span>
                                    <span>Beginner</span>
                                </div>
                                <div class="course-info-03__description">
                                    <p>Graphic Design is all around us! Words and pictures—the building …</p>
                                </div>
                                <div class="course-info-03__footer">

                                    <div class="course-info-03__footer-left">
                                        <a class="course-info-03__instructor" href="#">Nahla Jones</a>
                                    </div>
                                    <div class="course-info-03__footer-right">
                                        <div class="course-info-03__price">
                                            <span class="sale-price">$29.<small class="separator">00</small></span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!-- Course End -->

                    </div>
                    <div class="col-xl-3 col-md-6">

                        <!-- Course Start -->
                        <div class="course-item-03">
                            <div class="course-header-03">
                                <div class="course-header-03__thumbnail ">
                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-13.jpg" alt="courses" width="330" height="221"></a>
                                </div>
                                <div class="course-header-03__badge">
                                    <span class="hot">Featured</span>
                                    <span class="free">Free</span>
                                </div>
                            </div>
                            <div class="course-info-03">
                                <h3 class="course-info-03__title"><a href="course-single-layout-01.html">Adobe Illustrator CC – Essentials Training Course</a></h3>
                                <div class="course-info-03__meta">
                                    <span>1 Lessons</span>
                                    <span>8.5 hours</span>
                                    <span>Beginner</span>
                                </div>
                                <div class="course-info-03__description">
                                    <p>Are you frustrated trying to teach yourself Adobe Illustrator?! This …</p>
                                </div>
                                <div class="course-info-03__footer">

                                    <div class="course-info-03__footer-left">
                                        <a class="course-info-03__instructor" href="#">Owen Christ</a>
                                        <div class="course-info-03__rating">

                                            <div class="rating-star">
                                                <div class="rating-label" style="width: 100%;"></div>
                                            </div>

                                            <span>(2)</span>
                                        </div>
                                    </div>
                                    <div class="course-info-03__footer-right">
                                        <div class="course-info-03__price">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!-- Course End -->

                    </div>
                    <div class="col-xl-3 col-md-6">

                        <!-- Course Start -->
                        <div class="course-item-03">
                            <div class="course-header-03">
                                <div class="course-header-03__thumbnail ">
                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-31.jpg" alt="courses" width="330" height="221"></a>
                                </div>
                                <div class="course-header-03__badge">
                                    <span class="hot">Featured</span>
                                </div>
                            </div>
                            <div class="course-info-03">
                                <h3 class="course-info-03__title"><a href="course-single-layout-01.html">Fundamentals of Graphic Design</a></h3>
                                <div class="course-info-03__meta">
                                    <span>4 Lessons</span>
                                    <span>19 hours</span>
                                    <span>Beginner</span>
                                </div>
                                <div class="course-info-03__description">
                                    <p>Graphic Design is all around us! Words and pictures—the building …</p>
                                </div>
                                <div class="course-info-03__footer">

                                    <div class="course-info-03__footer-left">
                                        <a class="course-info-03__instructor" href="#">Owen Christ</a>
                                    </div>
                                    <div class="course-info-03__footer-right">
                                        <div class="course-info-03__price">
                                            <span class="sale-price">$39.<small class="separator">00</small></span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!-- Course End -->

                    </div>
                </div>

            </div>
        </div>
        <!-- Courses Category Featured End -->

        <!-- Courses Category Start -->
        <div class="courses-category-section section-padding-02">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="section-title__title"><mark>Popular </mark> Courses</h2>
                </div>
                <!-- Section Title End -->

                <!-- Courses Popular Topic List Start -->
                <div class="course-popular-topic-list">
                    <a href="#" class="popular-topic-link">art</a>
                    <a href="#" class="popular-topic-link">Graphic</a>
                    <a href="#" class="popular-topic-link">Design</a>
                    <a href="#" class="popular-topic-link">Web Design</a>
                    <a href="#" class="popular-topic-link">branding</a>
                    <a href="#" class="popular-topic-link">UX</a>
                    <a href="#" class="popular-topic-link">Adobe</a>
                    <a href="#" class="popular-topic-link">Illustrator</a>
                    <a href="#" class="popular-topic-link">drawing</a>
                    <a href="#" class="popular-topic-link">Photoshop</a>
                    <a href="#" class="popular-topic-link">UI</a>
                </div>
                <!-- Courses Popular Topic List End -->

            </div>
        </div>
        <!-- Courses Category Featured End -->

        <!-- Courses Instructor Start -->
        <div class="courses-section section-padding-02">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="section-title__title"><mark>Popular </mark> Instructors</h2>
                </div>
                <!-- Section Title End -->

                <div class="instructor-active swiper-button-style swiper-dots-style">
                    <div class="instructor-wrapper position-relative">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Instructor Start -->
                                <div class="swiper-slide instructor-item-02">
                                    <a class="instructor-item-02__link" href="#">
                                        <div class="instructor-item-02__header">
                                            <div class="instructor-item-02__image">
                                                <img src="assets/images/instructor/instructor-02.jpg" alt="Instructor" width="70" height="70">
                                            </div>
                                            <div class="instructor-item-02__content text-start">
                                                <h4 class="instructor-item-02__name">Emilee Logan</h4>
                                                <p class="instructor-item-02__designation">Master of Education Degree</p>
                                                <div class="instructor-item-02__rating justify-content-start">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>

                                                    <div class="rating-average">4.67/<span>5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="instructor-item-02__footer">
                                            <div class="instructor-item-02__meta"> <i class="fas fa-file-alt"></i> <span class="value">15 courses</span></div>
                                            <div class="instructor-item-02__meta"> <i class="fas fa-user"></i> <span class="value">77 students</span></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instructor End -->

                                <!-- Instructor Start -->
                                <div class="swiper-slide instructor-item-02">
                                    <a class="instructor-item-02__link" href="#">
                                        <div class="instructor-item-02__header">
                                            <div class="instructor-item-02__image">
                                                <img src="assets/images/instructor/instructor-01.jpg" alt="Instructor" width="70" height="70">
                                            </div>
                                            <div class="instructor-item-02__content text-start">
                                                <h4 class="instructor-item-02__name">Tomi Hensley</h4>
                                                <p class="instructor-item-02__designation">Ph.D.</p>
                                                <div class="instructor-item-02__rating justify-content-start">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>

                                                    <div class="rating-average">5.0/<span>5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="instructor-item-02__footer">
                                            <div class="instructor-item-02__meta"> <i class="fas fa-file-alt"></i> <span class="value">8 courses</span></div>
                                            <div class="instructor-item-02__meta"> <i class="fas fa-user"></i> <span class="value">0 students</span></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instructor End -->

                                <!-- Instructor Start -->
                                <div class="swiper-slide instructor-item-02">
                                    <a class="instructor-item-02__link" href="#">
                                        <div class="instructor-item-02__header">
                                            <div class="instructor-item-02__image">
                                                <img src="assets/images/instructor/instructor-03.jpg" alt="Instructor" width="70" height="70">
                                            </div>
                                            <div class="instructor-item-02__content text-start">
                                                <h4 class="instructor-item-02__name">Nahla Jones</h4>
                                                <p class="instructor-item-02__designation">Master's Degree</p>
                                                <div class="instructor-item-02__rating justify-content-start">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>

                                                    <div class="rating-average">5.0/<span>5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="instructor-item-02__footer">
                                            <div class="instructor-item-02__meta"> <i class="fas fa-file-alt"></i> <span class="value">11 courses</span></div>
                                            <div class="instructor-item-02__meta"> <i class="fas fa-user"></i> <span class="value">3 students</span></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instructor End -->

                                <!-- Instructor Start -->
                                <div class="swiper-slide instructor-item-02">
                                    <a class="instructor-item-02__link" href="#">
                                        <div class="instructor-item-02__header">
                                            <div class="instructor-item-02__image">
                                                <img src="assets/images/instructor/instructor-04.jpg" alt="Instructor" width="70" height="70">
                                            </div>
                                            <div class="instructor-item-02__content text-start">
                                                <h4 class="instructor-item-02__name">Alex Itzel</h4>
                                                <p class="instructor-item-02__designation">Photographer</p>
                                                <div class="instructor-item-02__rating justify-content-start">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>

                                                    <div class="rating-average">4.67/<span>5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="instructor-item-02__footer">
                                            <div class="instructor-item-02__meta"> <i class="fas fa-file-alt"></i> <span class="value">9 courses</span></div>
                                            <div class="instructor-item-02__meta"> <i class="fas fa-user"></i> <span class="value">10 students</span></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instructor End -->

                                <!-- Instructor Start -->
                                <div class="swiper-slide instructor-item-02">
                                    <a class="instructor-item-02__link" href="#">
                                        <div class="instructor-item-02__header">
                                            <div class="instructor-item-02__image">
                                                <img src="assets/images/instructor/instructor-05.jpg" alt="Instructor" width="70" height="70">
                                            </div>
                                            <div class="instructor-item-02__content text-start">
                                                <h4 class="instructor-item-02__name">Owen Christ</h4>
                                                <p class="instructor-item-02__designation">Master of Education Degree</p>
                                                <div class="instructor-item-02__rating justify-content-start">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>

                                                    <div class="rating-average">4.75/<span>5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="instructor-item-02__footer">
                                            <div class="instructor-item-02__meta"> <i class="fas fa-file-alt"></i> <span class="value">42 courses</span></div>
                                            <div class="instructor-item-02__meta"> <i class="fas fa-user"></i> <span class="value">101 students</span></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instructor End -->

                                <!-- Instructor Start -->
                                <div class="swiper-slide instructor-item-02">
                                    <a class="instructor-item-02__link" href="#">
                                        <div class="instructor-item-02__header">
                                            <div class="instructor-item-02__image">
                                                <img src="assets/images/instructor/instructor-06.jpg" alt="Instructor" width="70" height="70">
                                            </div>
                                            <div class="instructor-item-02__content text-start">
                                                <h4 class="instructor-item-02__name">Donald Logan</h4>
                                                <p class="instructor-item-02__designation">Master's Degree, Entrepreneur</p>
                                                <div class="instructor-item-02__rating justify-content-start">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 80%;"></div>
                                                    </div>

                                                    <div class="rating-average">4.67/<span>5</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="instructor-item-02__footer">
                                            <div class="instructor-item-02__meta"> <i class="fas fa-file-alt"></i> <span class="value">12 courses</span></div>
                                            <div class="instructor-item-02__meta"> <i class="fas fa-user"></i> <span class="value">9 students</span></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Instructor End -->
                            </div>
                        </div>

                        <div class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
                        <div class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>

                    </div>

                    <div class="swiper-pagination"></div>

                </div>

            </div>
        </div>
        <!-- Courses Instructor Category Featured End -->

        <!-- Courses Start -->
        <div class="courses-section section-padding-01">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="section-title__title">All <mark> Art & Design </mark> Courses</h2>
                </div>
                <!-- Section Title End -->

                <div class="row gy-10 flex-row-reverse">
                    <div class="col-lg-9">

                        <!-- Archive Filter Bars Start -->
                        <div class="archive-filter-bars">

                            <div class="archive-filter-bar">
                                <p>We found <span>8</span> courses available for you</p>
                            </div>

                            <div class="archive-filter-bar">

                                <div class="filter-bar-wrapper">
                                    <span>See</span>
                                    <ul class="nav">
                                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fas fa-th"></i></button></li>
                                        <li><button data-bs-toggle="tab" data-bs-target="#list"><i class="fas fa-bars"></i></button></li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <!-- Archive Filter Bars End -->

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="grid">

                                <div class="row gy-6">
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-22.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                                <div class="course-header__badge">
                                                    <span class="hot">Featured</span>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-intermediate">Intermediate</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Art & Design</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">The Complete Graphic Design Theory for Beginners Course</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Even if you’re a complete beginner, this course will show …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="sale-price">$45.<small class="separator">00</small></span>
                                                </div>
                                                <div class="course-info-02__rating">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>

                                                    <span>(2)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-9.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-intermediate">Intermediate</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Art & Design</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">User Experience Design Fundamentals</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Even if you’re a complete beginner, this course will show …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="sale-price">$42.<small class="separator">00</small></span>
                                                </div>
                                                <div class="course-info-02__rating">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>

                                                    <span>(2)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-23.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                                <div class="course-header__badge">
                                                    <span class="hot">Featured</span>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-beginner">Beginner</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Graphic Design</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">Graphic Design Bootcamp: Photoshop, Illustrator, InDesign</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Graphic Design is all around us! Words and pictures—the building …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="sale-price">$29.<small class="separator">00</small></span>
                                                </div>
                                                <div class="course-info-02__rating">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>

                                                    <span>(2)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-28.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                                <div class="course-header__badge">
                                                    <span class="free">Free</span>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-intermediate">Intermediate</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Art & Design</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">Ultimate Photoshop Training: From Beginner to Pro</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Even if you’re a complete beginner, this course will show …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="free">Free</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-8.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-beginner">Beginner</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Design Tools</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">Illustrator 2020 MasterClass</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Are you frustrated trying to teach yourself Adobe Illustrator?! This …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="sale-price">$22.<small class="separator">00</small></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-13.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                                <div class="course-header__badge">
                                                    <span class="hot">Featured</span>
                                                    <span class="free">Free</span>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-all">Beginner</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Communications</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">Adobe Illustrator CC – Essentials Training Course</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Are you frustrated trying to teach yourself Adobe Illustrator?! This …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="free">Free</span>
                                                </div>
                                                <div class="course-info-02__rating">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>

                                                    <span>(2)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-30.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                                <div class="course-header__badge">
                                                    <span class="onsale">-50%</span>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-intermediate">Intermediate</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Art & Design</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">UX & Web Design Master Course</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Even if you’re a complete beginner, this course will show …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="sale-price">$45.<small class="separator">00</small></span>
                                                    <span class="regular-price">$90.<small class="separator">00</small></span>
                                                </div>
                                                <div class="course-info-02__rating">

                                                    <div class="rating-star">
                                                        <div class="rating-label" style="width: 100%;"></div>
                                                    </div>

                                                    <span>(2)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                    <div class="col-xl-4 col-md-6">

                                        <!-- Course Start -->
                                        <div class="course-item-02" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="course-header">
                                                <div class="course-header__thumbnail ">
                                                    <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-31.jpg" alt="courses" width="330" height="221"></a>
                                                </div>
                                                <div class="course-header__badge">
                                                    <span class="hot">Featured</span>
                                                </div>
                                            </div>
                                            <div class="course-info-02">
                                                <span class="course-info-02__badge-text badge-beginner">Beginner</span>
                                                <div class="course-info-02__category">
                                                    <a href="#">Graphic Design</a>
                                                </div>
                                                <h3 class="course-info-02__title"><a href="course-single-layout-01.html">Fundamentals of Graphic Design</a></h3>
                                                <div class="course-info-02__description">
                                                    <p>Graphic Design is all around us! Words and pictures—the building …</p>
                                                </div>
                                                <div class="course-info-02__price">
                                                    <span class="sale-price">$39.<small class="separator">00</small></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Course End -->

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="list">

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-1.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Successful Negotiation: Master Your Negotiating Skills</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 5 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 2.3 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> All Levels</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>Negotiation is a skill well worth mastering – by putting …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="sale-price">$42.<small class="separator">00</small></span>
                                            </div>
                                            <div class="course-list-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <div class="rating-average">
                                                    <span class="rating-average__average">5.0</span>
                                                    <span class="rating-average__total">/5</span>
                                                </div>

                                                <p class="course-list-info__rating-count">(2 ratings)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-2.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Time Management Mastery: Do More, Stress Less</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 7 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 3.5 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> All Levels</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>If you’re someone who has a LOT on their plate …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="sale-price">$29.<small class="separator">00</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-3.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Angular – The Complete Guide (2020 Edition)</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 5 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 2.3 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> All Levels</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>From Setup to Deployment, this course covers it all! You’ll learn all about Components, Directives, Services, Forms, Http Access, Authentication, …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="sale-price">$49.<small class="separator">00</small></span>
                                            </div>
                                            <div class="course-list-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <div class="rating-average">
                                                    <span class="rating-average__average">5.0</span>
                                                    <span class="rating-average__total">/5</span>
                                                </div>

                                                <p class="course-list-info__rating-count">(2 ratings)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-4.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Consulting Approach to Problem Solving</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 5 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 2.3 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> All Levels</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>Consulting Approach to Problem Solving</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-list-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <div class="rating-average">
                                                    <span class="rating-average__average">5.0</span>
                                                    <span class="rating-average__total">/5</span>
                                                </div>

                                                <p class="course-list-info__rating-count">(1 ratings)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-5.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">The Business Intelligence Analyst Course 2020</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 7 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 22.5 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> Beginner</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>Our program is different than the rest of the materials …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-6.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                        <div class="course-header__badge">
                                            <span class="free">Free</span>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Become a Product Manager | Learn the Skills & Get the Job</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 6 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 22.5 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> All Levels</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>Negotiation is a skill well worth mastering – by putting …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="free">Free</span>
                                            </div>
                                            <div class="course-list-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <div class="rating-average">
                                                    <span class="rating-average__average">5.0</span>
                                                    <span class="rating-average__total">/5</span>
                                                </div>

                                                <p class="course-list-info__rating-count">(1 ratings)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-7.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Mechanical Engineering and Electrical Engineering Explained</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 5 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 9.9 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> Beginner</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>Electronics has become important to many fields; communications, automotive, security, …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="sale-price">$84.<small class="separator">00</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course List End -->

                                <!-- Course List Start -->
                                <div class="course-list-item">
                                    <div class="course-list-header">
                                        <div class="course-list-header__thumbnail ">
                                            <a href="course-single-layout-01.html"><img src="assets/images/courses/courses-8.jpg" alt="courses" width="270" height="181"></a>
                                        </div>
                                    </div>
                                    <div class="course-list-info">
                                        <h3 class="course-list-info__title"><a href="course-single-layout-01.html">Learn Algebra The Easy Way!</a></h3>
                                        <div class="course-list-info__meta">
                                            <span><i class="fas fa-play-circle"></i> 5 Lessons</span>
                                            <span><i class="fas fa-clock"></i> 8.5 hours</span>
                                            <span><i class="fas fa-sliders-h"></i> Beginner</span>
                                        </div>
                                        <div class="course-list-info__description">
                                            <p>This course will begin with an overview of data types …</p>
                                        </div>
                                        <div class="course-list-info__action">
                                            <button class="btn btn-primary btn-hover-secondary">Add to cart</button>
                                            <button class="btn-icon btn-light btn-hover-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <div class="course-list-info__footer">
                                            <div class="course-list-info__price">
                                                <span class="sale-price">$42.<small class="separator">00</small></span>
                                            </div>
                                            <div class="course-list-info__rating">

                                                <div class="rating-star">
                                                    <div class="rating-label" style="width: 100%;"></div>
                                                </div>

                                                <div class="rating-average">
                                                    <span class="rating-average__average">5.0</span>
                                                    <span class="rating-average__total">/5</span>
                                                </div>

                                                <p class="course-list-info__rating-count">(2 ratings)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    <div class="col-lg-3">
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-wrapper">

                            <!-- Sidebar Widget Wrapper Start -->
                            <div class="sidebar-widget-wrap bg-color-10">
                                <h4 class="sidebar-widget-wrap__title">Filter by category</h4>

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories13" name="sort-by">
                                                    <label for="categories13">Art & Design <span>(8)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories14" name="sort-by">
                                                    <label for="categories14">Business <span>(12)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories15" name="sort-by">
                                                    <label for="categories15">Data Science <span>(7)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories16" name="sort-by">
                                                    <label for="categories16">Development <span>(10)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories17" name="sort-by">
                                                    <label for="categories17">Finance <span>(8)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories18" name="sort-by">
                                                    <label for="categories18">Health & Fitness <span>(8)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories19" name="sort-by">
                                                    <label for="categories19">Lifestyle <span>(9)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories20" name="sort-by">
                                                    <label for="categories20">Marketing <span>(8)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories21" name="sort-by">
                                                    <label for="categories21">Music <span>(8)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories22" name="sort-by">
                                                    <label for="categories22">Personal Development <span>(9)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories23" name="sort-by">
                                                    <label for="categories23">Photography <span>(7)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="categories24" name="sort-by">
                                                    <label for="categories24">Teaching & Academics <span>(7)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                            </div>
                            <!-- Sidebar Widget Wrapper End -->

                            <!-- Sidebar Widget Wrapper Start -->
                            <div class="sidebar-widget-wrap bg-color-10 mt-4">
                                <h4 class="sidebar-widget-wrap__title">Filter by</h4>

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title-02">Instructor</h4>

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="instructor9" name="sort-by">
                                                    <label for="instructor9">Donald Logan <span>(11)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="instructor10" name="sort-by">
                                                    <label for="instructor10">Emilee Logan <span>(12)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="instructor11" name="sort-by">
                                                    <label for="instructor11">Nahla Jones <span>(9)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title-02">Price</h4>

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="radio" id="radio4" checked name="sort-by">
                                                    <label for="radio4">All <span>(101)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="radio" id="radio5" name="sort-by">
                                                    <label for="radio5">Free <span>(6)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="radio" id="radio6" name="sort-by">
                                                    <label for="radio6">Paid <span>(95)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title-02">Level</h4>

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="level5" name="sort-by">
                                                    <label for="level5">All Levels <span>(50)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="level6" name="sort-by">
                                                    <label for="level6">Beginner <span>(32)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="level7" name="sort-by">
                                                    <label for="level7">Intermediate <span>(17)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="level8" name="sort-by">
                                                    <label for="level8">Expert <span>(2)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title">Language</h4>

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="language10" name="sort-by">
                                                    <label for="language10">English <span>(21)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title-02">Rating</h4>

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="rating6" name="sort-by">
                                                    <label for="rating6">
                                                        <span class="star-line">
                                    <span class="star" style="width: 100%;"></span>
                                                        </span>

                                                        <span>(07)</span>
                                                    </label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="rating7" name="sort-by">
                                                    <label for="rating7">
                                                        <span class="star-line">
                                    <span class="star" style="width: 80%;"></span>
                                                        </span>

                                                        <span>(0)</span>
                                                    </label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="rating8" name="sort-by">
                                                    <label for="rating8">
                                                        <span class="star-line">
                                    <span class="star" style="width: 60%;"></span>
                                                        </span>

                                                        <span>(0)</span>
                                                    </label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="rating9" name="sort-by">
                                                    <label for="rating9">
                                                        <span class="star-line">
                                    <span class="star" style="width: 40%;"></span>
                                                        </span>

                                                        <span>(0)</span>
                                                    </label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="rating10" name="sort-by">
                                                    <label for="rating10">
                                                        <span class="star-line">
                                    <span class="star" style="width: 20%;"></span>
                                                        </span>

                                                        <span>(0)</span>
                                                    </label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                                <!-- Widget Filter Start -->
                                <div class="widget-filter">
                                    <h4 class="widget-filter__title-02">Duration</h4>

                                    <!-- Widget Filter Wrapper Start -->
                                    <div class="widget-filter__wrapper">
                                        <ul class="widget-filter__list">
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="duration5" name="sort-by">
                                                    <label for="duration5">Less than 2 hours <span>(57)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="duration6" name="sort-by">
                                                    <label for="duration6">3 - 6 hours <span>(7)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="duration7" name="sort-by">
                                                    <label for="duration7">7 - 16 hours <span>(10)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                            <li>
                                                <!-- Widget Filter Item Start -->
                                                <div class="widget-filter__item">
                                                    <input type="checkbox" id="duration8" name="sort-by">
                                                    <label for="duration8">17+ Hours <span>(27)</span></label>
                                                </div>
                                                <!-- Widget Filter Item End -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Widget Filter Wrapper End -->
                                </div>
                                <!-- Widget Filter End -->

                            </div>
                            <!-- Sidebar Widget Wrapper End -->

                        </div>
                        <!-- Sidebar Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->

        <!-- Courses Hover End -->
        <div id="course-hover">
            <div class="course-item-hover">
                <div class="course-item-hover__category">
                    <a href="#">Communications</a>
                </div>
                <h2 class="course-item-hover__title"><a href="course-single-layout-01.html">Successful Negotiation: Master Your Negotiating Skills</a></h2>
                <div class="course-item-hover__rating">

                    <div class="rating-star">
                        <div class="rating-label" style="width: 100%;"></div>
                    </div>

                    <div class="rating-average">
                        <span class="rating-average__average">5.0</span>
                        <span class="rating-average__total">/5</span>
                    </div>

                    <p class="course-item-hover__rating-count">(2 ratings)</p>
                </div>
                <div class="course-item-hover__meta">
                    <span>5 Lessons</span>
                    <span>2.3 hours</span>
                    <span>All Levels</span>
                </div>
                <div class="course-item-hover__benefits">
                    <h6 class="course-item-hover__benefits-title">What you'll learn</h6>
                    <ul class="course-item-hover__benefits-list">
                        <li>Negotiate effectively and fairly to make 1000s more than they would otherwise</li>
                        <li>Be confident in starting and finishing a negotiation</li>
                        <li>Use smart tactics to increase their bargaining power</li>
                        <li>Develop mental and emotional strength to keep pushing until they get a great price</li>
                        <li>Use negotiating skills in both personal and professional situations</li>
                    </ul>
                </div>
                <div class="course-item-hover__btn">
                    <a class="btn btn-primary btn-hover-secondary w-100" href="#">Add to cart</a>
                    <a class="btn-link" href="#"><i class="far fa-heart"></i> Add to wishlist</a>
                </div>
            </div>
        </div>
        <!-- Courses Hover End -->

        <!-- Courses List Hover End -->
        <div id="course-list-hover">
            <div class="course-item-hover">
                <div class="course-item-hover__category">
                    <a href="#">Communications</a>
                </div>
                <h2 class="course-item-hover__title"><a href="course-single-layout-01.html">Successful Negotiation: Master Your Negotiating Skills</a></h2>
                <div class="course-item-hover__rating">

                    <div class="rating-star">
                        <div class="rating-label" style="width: 100%;"></div>
                    </div>

                    <div class="rating-average">
                        <span class="rating-average__average">5.0</span>
                        <span class="rating-average__total">/5</span>
                    </div>

                    <p class="course-item-hover__rating-count">(2 ratings)</p>
                </div>
                <div class="course-item-hover__meta">
                    <span>5 Lessons</span>
                    <span>2.3 hours</span>
                    <span>All Levels</span>
                </div>
                <div class="course-item-hover__benefits">
                    <h6 class="course-item-hover__benefits-title">What you'll learn</h6>
                    <ul class="course-item-hover__benefits-list">
                        <li>Negotiate effectively and fairly to make 1000s more than they would otherwise</li>
                        <li>Be confident in starting and finishing a negotiation</li>
                        <li>Use smart tactics to increase their bargaining power</li>
                        <li>Develop mental and emotional strength to keep pushing until they get a great price</li>
                        <li>Use negotiating skills in both personal and professional situations</li>
                    </ul>
                </div>
                <div class="course-item-hover__btn">
                    <a class="btn btn-primary btn-hover-secondary w-100" href="#">Add to cart</a>
                    <a class="btn-link" href="#"><i class="far fa-heart"></i> Add to wishlist</a>
                </div>
            </div>
        </div>
        <!-- Courses List Hover End -->

@endsection
