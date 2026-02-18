@extends('website.layouts.main')
@section('content')



    <!-- Page Banner Section Start -->
    <div class="page-banner bg-color-05">
        <div class="page-banner__wrapper">
            <div class="container">

                <!-- Page Breadcrumb Start -->
                <div class="page-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active">Back To School Social-Emotional Basics: Relationship, Rhythm,
                            Release</li>
                    </ul>
                </div>
                <!-- Page Breadcrumb End -->

                <!-- Page Banner Caption Start -->
                <div class="page-banner__caption text-center">
                    <h2 class="page-banner__main-title">Blog Details</h2>
                </div>
                <!-- Page Banner Caption End -->

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

    <!-- Blog Start -->
    <div class="blog-section section-padding-01">
        <div class="container custom-container">
            <div class="row gy-10">
                <div class="col-lg-8">

                    <div class="blog-details">
                        <div class="blog-details">
                            <div class="blog-details__image">
                                <img src="{{ asset('storage/' . $blog->feature_image) }}"
                                    alt="{{ $blog->feature_image_alt ?? $blog->title }}" width="770" height="418">

                                {{-- Categories (if available) --}}
                                @if ($blog->categories && $blog->categories->count())
                                    <div class="blog-details__categories">
                                        @foreach ($blog->categories as $category)
                                            <a href="#">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="blog-item-02__meta">
                                <span class="meta-action"><i class="fas fa-calendar"></i>
                                    {{ $blog->published_at }}</span>
                            </div>


                        </div>





                        <div class="blog-details__content">

                            <h3 class="blog-details__title">{{ $blog->title }}</h3>
                             <div class="blog-details__content">

                                <p>{{ $blog->short_description }}</p>
                            </div>


                            <blockquote class="blockquote">
                                <p>{{$blog->quotation}}</p>
                            </blockquote>
                              <p>{{ $blog->long_description }}</p>
                            {{-- <p>So, how can we support them to support our children’s learning? As parents and school
                                administrators, we can relax about the ‘learning’ and trust it will come. Schools are going
                                to need to change the focus right now to concentrating on the emotional basics before
                                academic basics. Teachers teach people, not subjects. And when they can focus on supporting
                                well-being first, the learning may then have an opportunity to land. </p>
                            <p><strong>Let’s take a closer look at the 3 R’s of emotional basics:</strong></p>
                            <p><strong>Relationship</strong></p>
                            <p>What our students need from us is..us. They need to know we are there for them, and that they
                                matter. It’s not so much about what we say—it’s about how we make them feel in our presence:
                                invited, accepted, and seen. </p>
                            <p>During this emotionally turbulent time, we will need to make conscious invitations into
                                relationship so that our students can feel connected to us. This might mean special greeting
                                rituals at the beginning of each day and more playful activities in which we join in. These
                                attachment practices can help our students to feel connected to us, which may also lower
                                their anxiety. </p>
                            <p><strong>Rhythm</strong></p>
                            <p>Children crave rhythm.</p>
                            <p>Consistent routines, rituals, and structures help children feel safe. They can lean on these
                                and rely on them. Yet most children are experiencing the exact opposite right now. And as
                                they look to returning to school, they may have little to no sense of what the ‘new normal’
                                will be. We can create a sense of safety by quickly establishing new routines that our
                                students can count on and orient around. This will help to produce a rhythm to their days
                                and can offer a sense of predictability in these unpredictable times.</p>
                            <p><strong>Release</strong></p>
                            <p>Our students’ emotions will be stirred up. And we know that when emotions get stirred up,
                                they need somewhere to go. Finding healthy ways to pre-emptively channel this emotional
                                energy for our students can help to alleviate dangerous or disruptive eruptions. Integrating
                                daily outlets for release can be especially helpful for supporting students to get out
                                frustration before it leads to outbursts of aggression.</p>
                            <p>These outlets can also help students to reflect on and express their feelings in ways that
                                don’t make them feel self-conscious. The beauty of this practice is that we don’t even have
                                to know what is specifically going on for a child. We are simply facilitating a way for the
                                emotion to be expressed and released indirectly in a natural way—whether through music,
                                physical movement, stories or storytelling, writing, poetry, drama, art, or even simply
                                being outdoors. All of these outlets are powerful because they help us come closer to our
                                feelings and to experiencing a sense of release and emotional rest.</p>
                            <p>Going back to school during this time will not be easy. We will need to be creative and think
                                outside the box. We may need to stretch muscles we never knew we had. But it may be helpful
                                to remember that this is not a time to focus on outcome and performance, or getting ahead or
                                even catching up. Shifting our attention to matters of the heart will help our students feel
                                safe. This is what will set the stage for learning to happen – when children are ready.</p>
                            <p>In the meantime, let’s be patient with our students and ourselves. We are all in this
                                together.</p> --}}
                        </div>

                        <div class="blog-details__footer">

                            <div class="blog-details__tags">
                                {{-- <span class="blog-details__tags-label"><i class="fas fa-tags"></i></span> --}}

                            </div>

                            <div class="blog-details__share">
                                {{-- <span class="blog-details__share-label">Share this post</span> --}}

                                <div class="blog-details__share-media">
                                    <div class="blog-details__share-icon">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <ul class="blog-details__share-social">
                                        <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                title="Tumblr"><i class="fab fa-tumblr-square"></i></a></li>
                                        <li><a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                title="Email"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                       <div class="blog-details__nav rowless">
    @if($previousPost)
        <div class="blog-details__nav-item prev">
            <a class="blog-details__nav-link" href="{{ route('BlogDetail', $previousPost->slug) }}">
                <div class="blog-details__hover-bg"
                     style="background-image:url('{{ asset('storage/'.$previousPost->feature_image) }}');"></div>
                <span class="text">{{ $previousPost->title }}</span>
                @if(!empty($previousPost->quotation))
                    <small class="quotation">"{{ $previousPost->quotation }}"</small>
                @endif
            </a>
        </div>
    @endif

    @if($nextPost)
        <div class="blog-details__nav-item next">
            <a class="blog-details__nav-link" href="{{ route('BlogDetail', $nextPost->slug) }}">
                <div class="blog-details__hover-bg"
                     style="background-image:url('{{ asset('storage/'.$nextPost->feature_image) }}');"></div>
                <span class="text">{{ $nextPost->title }}</span>
                @if(!empty($nextPost->quotation))
                    <small class="quotation">"{{ $nextPost->quotation }}"</small>
                @endif
            </a>
        </div>
    @endif
</div>

                    </div>
                    <!-- Blog Dtails End -->

                    <!-- Comment Start -->
                    <div class="comments-area">

                        <!-- Comment Wrapper Start -->
                        <div class="comment-wrap mt-8">
                            <h3 class="comment-title">Leave your thought here</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>

                            <!-- Comment Form Start -->
                            <div class="comment-form">
                                <form action="#">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="text" class="form-control" placeholder="Your Name *">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="comment-form__input">
                                                <input type="email" class="form-control" placeholder="Your Email *">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <textarea class="form-control" placeholder="Your Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input form-check">
                                                <input type="checkbox" id="save">
                                                <label for="save">Save my name, email, and website in this browser for
                                                    the next time I comment.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <button class="btn btn-primary btn-hover-secondary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Comment Form End -->

                        </div>
                        <!-- Comment Wrapper End -->

                    </div>
                    <!-- Comment End -->

                </div>
                <div class="col-lg-4">
                    <!-- Sidebar Widget Start -->
                    <div class="sidebar-widget-weap-02 ps-xl-6">

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Search</h4>

                            <!-- Sidebar Widget Search Start -->
                            <div class="sidebar-widget-02-search">
                                <form method="get" action="#">
                                    <input type="search" class="sidebar-widget-02-search__field" placeholder="Search…">
                                    <button type="submit" class="sidebar-widget-02-search__submit">
                                        <span class="search-btn-icon fas fa-search"></span>
                                    </button>
                                </form>
                            </div>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Categories</h4>

                            <!-- Sidebar Widget Search Start -->
                                   <ul class="sidebar-widget-02__link">
    @forelse($allCategories as $category)
        <li>
            <a href="{{ route('BlogCategory', $category->slug) }}">

                {{ $category->name }}
                <span class="count">({{ $category->posts_count }})</span>
            </a>
        </li>
    @empty
        <li>No categories found</li>
    @endforelse
</ul>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
       <div class="sidebar-widget-02">
    <h4 class="sidebar-widget-02__title">Latest Posts</h4>

    <ul class="sidebar-widget-02__psot">
        @foreach($latestPosts as $post)
            <li>
                <div class="sidebar-widget-02__psot-item">
                    <div class="sidebar-widget-02__psot-thumbnail">
                        <a href="{{ route('BlogDetail', $post->slug) }}">
                            <img src="{{ asset('storage/' . $post->feature_image) }}"
                                 alt="{{ $post->title }}" width="100" height="80">
                        </a>

                        @if($post->blogCategories->isNotEmpty())
                            <div class="sidebar-widget-02__categories">
                                <span>{{ $post->blogCategories->first()->name }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="sidebar-widget-02__psot-info">
                        <h5 class="sidebar-widget-02__psot-title">
                            <a href="{{ route('BlogDetail', $post->slug) }}">{{ $post->title }}</a>
                        </h5>
                        <span class="sidebar-widget-02__psot-date">
                            {{ optional($post->published_at ?? $post->created_at)->format('F d, Y') }}
                        </span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>


                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget-02">
                            <h4 class="sidebar-widget-02__title">Popular Tags</h4>

                            <!-- Sidebar Widget Search Start -->
                            <ul class="sidebar-widget-02__tags">
                                <li><a href="#">data science</a></li>
                                <li><a href="#">deep learning</a></li>
                                <li><a href="#">education</a></li>
                                <li><a href="#">language</a></li>
                                <li><a href="#">learning</a></li>
                                <li><a href="#">machine learning</a></li>
                                <li><a href="#">tips</a></li>
                                <li><a href="#">videos</a></li>
                                <li><a href="#">web development</a></li>
                            </ul>
                            <!-- Sidebar Widget Search End -->
                        </div>
                        <!-- Sidebar Widget End -->

                    </div>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection
