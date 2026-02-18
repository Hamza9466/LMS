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
                            <li class="breadcrumb-item active">Contact us</li>
                        </ul>
                    </div>
                    <!-- Page Breadcrumb End -->

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

        <!-- Contact us Section Start -->
        <div class="contact-section">
            <div class="container custom-container">

                <!-- Contact Title Start -->
                <div class="contact-title text-center section-padding-02" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="contact-title__title">We're always eager to hear from you!</h2>
                    <p>Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscorem ipsum dolor sit ametcipsum ipsumg consec tetur cing elitelit.</p>
                </div>
                <!-- Contact Title End -->

                <!-- Contact Info Start -->
                <div class="contact-info section-padding-02">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                                <div class="contact-info__icon">
                                    <i class="fas  fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info__content">
                                    <h3 class="contact-info__title">Address</h3>
                                    <p>1800 Abbot Kinney Blvd. Unit <br> D & E Venice</p>
                                </div>
                            </div>
                            <!-- Contact Info End -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                                <div class="contact-info__icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-info__content">
                                    <h3 class="contact-info__title">Contact</h3>
                                    <p>Mobile: <strong> (+88) - 1990 - 6886</strong></p>
                                    <p>Hotline: <strong>1800 - 1102</strong></p>
                                    <p>Mail: contact@edumall.com</p>
                                </div>
                            </div>
                            <!-- Contact Info End -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info__item" data-aos="fade-up" data-aos-duration="1000">
                                <div class="contact-info__icon">
                                    <i class="fas  fa-clock"></i>
                                </div>
                                <div class="contact-info__content">
                                    <h3 class="contact-info__title">Hour of operation</h3>
                                    <p>Monday - Friday: 09:00 - 20:00</p>
                                    <p>Sunday & Saturday: 10:30 - 22:00</p>
                                </div>
                            </div>
                            <!-- Contact Info End -->
                        </div>
                    </div>
                </div>
                <!-- Contact Info End -->

                <!-- Contact Map Start -->
               <div class="contact-map section-padding-02" data-aos="fade-up" data-aos-duration="1000">
    <iframe 
        id="gmap_canvas"
        src="https://maps.google.com/maps?q=C384+975,+Bakar+Mandi+Rd,+Liaquatabad,+Faisalabad,+Pakistan&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

                <!-- Contact Map End -->

                <!-- Contact Form Start -->
                <div class="contact-form section-padding-01">

                    <!-- Section Title Start -->
                    <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="section-title__title">Fill the form below so we can get to know you and your needs better.</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Form Wrapper Start -->
                  <div class="contact-form__wrapper" data-aos="fade-up" data-aos-duration="1000">
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="row gy-4">
            <div class="col-md-6">
                <div class="contact-form__input">
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Your name" 
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form__input">
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Email" 
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form__input">
                    <textarea 
                        name="message" 
                        class="form-control @error('message') is-invalid @enderror" 
                        placeholder="Message" 
                        rows="5"
                        required>{{ old('message') }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form__input text-center">
                    <button type="submit" class="btn btn-primary btn-hover-secondary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

                    <!-- Contact Form Wrapper End -->

                </div>
                <!-- Contact Form End -->

            </div>
        </div>
        <!-- Contact us Section End -->

@endsection
