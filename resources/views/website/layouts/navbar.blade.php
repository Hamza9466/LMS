<body>

    <main class="main-wrapper">

        <!-- Header start -->
        <div class="header-section header-sticky">

            <!-- Header Top Start -->
            <div class="header-top d-none d-sm-block">
                <div class="container">

                    <!-- Header Top Bar Wrapper Start -->
                    <div class="header-top-bar-wrap d-sm-flex justify-content-between">

                        <div class="header-top-bar-wrap__info">
                            <ul class="header-top-bar-wrap__info-list">
                                <li><a href="tel:+8819906886"><i class="fas fa-phone"></i> <span class="info-text">(+88) 1990 6886</span></a></li>
                                <li><a href="mailto:agency@example.com"><i class="far fa-envelope"></i> <span class="info-text">agency@example.com</span></a></li>
                            </ul>
                        </div>

                        <div class="header-top-bar-wrap__info d-sm-flex">
                            <ul class="header-top-bar-wrap__info-list d-none d-lg-flex">
                                <li><button data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button></li>
                                <li><button data-bs-toggle="modal" data-bs-target="#registerModal">Register</button></li>
                            </ul>
                            <ul class="header-top-bar-wrap__info-social">
                                <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- Header Top Bar Wrapper End -->

                </div>
            </div>
            <!-- Header Top End -->

            <!-- Header Main Start -->
            <div class="header-main">
                <div class="container">
                    <!-- Header Main Wrapper Start -->
                    <div class="header-main-wrapper">

                        <!-- Header Logo Start -->
                        <div class="header-logo">
                            <a class="header-logo__logo" href="index.html"> <img src="{{ asset('assets/website/images/home/white-logo.webp') }}"
     alt="Logo" width="150" height="32"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Category Menu Start -->
                        <div class="header-category-menu d-none d-xl-block">
                            <a href="#" class="header-category-toggle">
                                <div class="header-category-toggle__icon">
                                    <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill-rule="evenodd">
                                            <path d="M2,14 C3.1045695,14 4,14.8954305 4,16 C4,17.1045695 3.1045695,18 2,18 C0.8954305,18 0,17.1045695 0,16 C0,14.8954305 0.8954305,14 2,14 Z M9,14 C10.1045695,14 11,14.8954305 11,16 C11,17.1045695 10.1045695,18 9,18 C7.8954305,18 7,17.1045695 7,16 C7,14.8954305 7.8954305,14 9,14 Z M16,14 C17.1045695,14 18,14.8954305 18,16 C18,17.1045695 17.1045695,18 16,18 C14.8954305,18 14,17.1045695 14,16 C14,14.8954305 14.8954305,14 16,14 Z M2,7 C3.1045695,7 4,7.8954305 4,9 C4,10.1045695 3.1045695,11 2,11 C0.8954305,11 0,10.1045695 0,9 C0,7.8954305 0.8954305,7 2,7 Z M9,7 C10.1045695,7 11,7.8954305 11,9 C11,10.1045695 10.1045695,11 9,11 C7.8954305,11 7,10.1045695 7,9 C7,7.8954305 7.8954305,7 9,7 Z M16,7 C17.1045695,7 18,7.8954305 18,9 C18,10.1045695 17.1045695,11 16,11 C14.8954305,11 14,10.1045695 14,9 C14,7.8954305 14.8954305,7 16,7 Z M2,0 C3.1045695,0 4,0.8954305 4,2 C4,3.1045695 3.1045695,4 2,4 C0.8954305,4 0,3.1045695 0,2 C0,0.8954305 0.8954305,0 2,0 Z M9,0 C10.1045695,0 11,0.8954305 11,2 C11,3.1045695 10.1045695,4 9,4 C7.8954305,4 7,3.1045695 7,2 C7,0.8954305 7.8954305,0 9,0 Z M16,0 C17.1045695,0 18,0.8954305 18,2 C18,3.1045695 17.1045695,4 16,4 C14.8954305,4 14,3.1045695 14,2 C14,0.8954305 14.8954305,0 16,0 Z"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="header-category-toggle__text">Category</div>
                            </a>

                            <div class="header-category-dropdown-wrap">
<ul class="header-category-dropdown">
  @foreach($navCategories ?? [] as $cat)
    <li>
      <a href="{{ route('CourseGrid', ['category' => $cat->slug]) }}">
        {{ $cat->name }}
      </a>
    </li>
@endforeach

</ul>

</div>

                        </div>
                        <!-- Header Category Menu End -->

                        <!-- Header Inner Start -->
                        <div class="header-inner">

                            <!-- Header Search Start -->
                            <div class="header-serach">
                                <form action="#">
                                    <input type="text" class="header-serach__input" placeholder="Search...">
                                    <button class="header-serach__btn"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Header Search End -->

                            <!-- Header Navigation Start -->
                            <div class="header-navigation d-none d-xl-block">
                                <nav class="menu-primary">
                                    <ul class="menu-primary__container">
                                        <li><a class="active" href="{{ route('home') }}"><span>Home</span></a>

                                            {{-- <ul class="mega-menu">
                                                <li>
                                                    <!-- Mega Menu Content Start -->
                                                    <div class="mega-menu-content">
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <div class="menu-content-list">
                                                                    <a href="{{ route('home') }}" class="menu-content-list__link">Main Demo <span class="badge hot">Hot</span></a>
                                                                    <a href="{{ route('course_hub') }}" class="menu-content-list__link">Course Hub</a>

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
                                            </ul> --}}




                                        </li>
                                        <li>
                                            <a href="{{ route('CourseGrid') }}"><span>Courses</span></a>
                                            {{-- <ul class="sub-menu">
                                                <li><a href="{{ route('CourseGrid') }}"><span>Grid Basic Layout</span></a></li>
                                                 <li><a href="course-grid-02.html"><span>Grid Modern Layout</span></a></li>
                                                <li><a href="course-grid-left-sidebar.html"><span>Grid Left Sidebar</span></a></li>
                                                <li><a href="course-grid-right-sidebar.html"><span>Grid Right Sidebar</span></a></li>
                                                <li><a href="course-list.html"><span>List Basic Layout</span></a></li>
                                                <li><a href="course-list-left-sidebar.html"><span>List Left Sidebar</span></a></li>
                                                <li><a href="course-list-right-sidebar.html"><span>List Right Sidebar</span></a></li>
                                                <li><a href="course-category.html"><span>Category Page</span></a></li> --}}
                                                {{-- <li>
                                                    <a href="#"><span>Single Layout</span></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="course-single-layout-01.html"><span>Layout 01</span></a></li>
                                                        <li><a href="course-single-layout-02.html"><span>Layout 02</span></a></li>
                                                        <li><a href="course-single-layout-03.html"><span>Layout 03</span></a></li>
                                                        <li><a href="course-single-layout-04.html"><span>Layout 04</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul> --}}
                                        </li>
                                        <li>
                                            <a href="{{ route('Blog') }}"><span>Blog</span></a>
                                             {{-- <ul class="sub-menu">
                                                <li><a href="{{ route('Blog') }}"><span>Grid Basic Layout</span></a></li>
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
                                            </ul> --}}
                                        </li>
                                        <li>
                                            <a href="#"><span>Pages</span></a>
                                            <ul class="sub-menu">
                                                <li>

                                                    {{-- <ul class="sub-menu">
                                                        <li><a href="dashboard-my-courses.html"><span>My Courses</span></a></li>
                                                        <li><a href="dashboard-announcement.html"><span>Announcements</span></a></li>
                                                        <li><a href="dashboard-withdraw.html"><span>Withdrawals</span></a></li>
                                                        <li><a href="dashboard-quiz-attempts.html"><span>Quiz Attempts</span></a></li>
                                                        <li><a href="dashboard-question-answer.html"><span>Question & Answer</span></a></li>
                                                        <li><a href="dashboard-assignments.html"><span>Assignments</span></a></li>
                                                        <li><a href="dashboard-students.html"><span>My Students</span></a></li>
                                                    </ul> --}}
                                                </li>
                                                <li><a href="{{ route('about') }}"><span>About us</span></a></li>

                                                <li><a href="{{ route('Contact') }}"><span>Contact us</span></a></li>

                                                <li><a href="{{ route('faqs') }}"><span>FAQs</span></a></li>

                                                {{-- <li>
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
                                                </li> --}}
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ route('Zoom') }}"><span>Zoom Meetings</span></a>

                                        </li>

















                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Navigation End -->

                            <!-- Header Mini Cart Start -->
                   <div class="header-action">
  <a href="{{ route('cart.index') }}" class="header-action__btn">
    <i class="fas fa-shopping-basket"></i>
    <span class="header-action__number">{{ $cartCount ?? 0 }}</span>
  </a>

  <div class="header-mini-cart">
    @if(!empty($cartItems))
      <ul class="header-mini-cart__product-list">
        @foreach($cartItems as $it)
          <li class="header-mini-cart__item">
            {{-- Remove item form --}}
            <form method="POST" action="{{ route('cart.remove') }}" class="header-mini-cart__close">
              @csrf
              <input type="hidden" name="course_id" value="{{ $it['course_id'] }}">
              <button type="submit" style="all:unset;cursor:pointer;" title="Remove">×</button>
            </form>

            {{-- Thumbnail --}}
            <div class="header-mini-cart__thumbnail">
              <a href="{{ route('CourseDetail', ['slug' => $it['slug']]) }}">
                <img 
                  src="{{ isset($it['thumbnail']) && $it['thumbnail'] != '' ? asset('storage/' . $it['thumbnail']) : asset('images/default-course.png') }}" 
                  alt="Course" width="80" height="93">
              </a>
            </div>

            {{-- Course info --}}
            <div class="header-mini-cart__caption">
              <h3 class="header-mini-cart__name">
                <a href="{{ route('CourseDetail', ['slug' => $it['slug']]) }}">
                  {{ \Illuminate\Support\Str::limit($it['title'], 48) }}
                </a>
              </h3>

              <span class="header-mini-cart__quantity">
                {{ $it['qty'] ?? 1 }} ×
                @if(($it['price'] ?? 0) == 0)
                  <strong class="amount">Free</strong>
                @else
                  <strong class="amount">${{ number_format($it['price'], 2) }}</strong>
                @endif
              </span>
            </div>
          </li>
        @endforeach
      </ul>

      {{-- Cart total & buttons --}}
      <div class="header-mini-cart__footer">
        <div class="header-mini-cart__total">
          <p class="header-mini-cart__label">Total:</p>
          <p class="header-mini-cart__value">${{ number_format($cartTotal ?? 0, 2) }}</p>
        </div>
        <div class="header-mini-cart__btn">
          <a href="{{ route('cart.index') }}" class="btn btn-primary btn-hover-secondary">View cart</a>
          <a href="{{ route('cart.index') }}" class="btn btn-primary btn-hover-secondary">Checkout</a>
        </div>
      </div>
    @else
      <div class="p-3 text-center text-muted">Your cart is empty.</div>
    @endif
  </div>
</div>



                            <!-- Header Mini Cart End -->

                            <!-- Header Mobile Toggle Start -->
                            <div class="header-toggle">
                                <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </button>
                                <button class="header-toggle__btn search-open d-flex d-md-none">
                                    <span class="dots"></span>
                                    <span class="dots"></span>
                                    <span class="dots"></span>
                                </button>
                            </div>
                            <!-- Header Mobile Toggle End -->

                        </div>
                        <!-- Header Inner End -->

                    </div>
                    <!-- Header Main Wrapper End -->
                </div>
            </div>
            <!-- Header Main End -->

        </div>
        <!-- Header End -->