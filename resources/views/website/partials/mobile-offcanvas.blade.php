{{-- Mobile menu: real site links + login/sign up (modals) or dashboard/logout when authenticated --}}
<div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu">
    <div class="offcanvas-header bg-white">
        <div class="offcanvas-logo">
            <a class="offcanvas-logo__logo" href="{{ route('home') }}"><img src="{{ asset('assets/website/images/dark-logo.png') }}" alt="Logo"></a>
        </div>
        <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fas fa-times"></i></button>
    </div>

    <div class="offcanvas-body">
        <nav class="canvas-menu">
            <ul class="offcanvas-menu">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><span>Home</span></a>
                </li>
                <li>
                    <a href="{{ route('CourseGrid') }}" class="{{ request()->routeIs('CourseGrid') || request()->routeIs('CourseDetail') ? 'active' : '' }}"><span>Courses</span></a>
                </li>
                <li>
                    <a href="{{ route('CourseCategory') }}" class="{{ request()->routeIs('CourseCategory') ? 'active' : '' }}"><span>Categories</span></a>
                </li>
                <li>
                    <a href="#" class="{{ request()->routeIs('course_hub', 'about', 'Contact') ? 'active' : '' }}"><span>Pages</span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('course_hub') }}" class="{{ request()->routeIs('course_hub') ? 'active' : '' }}"><span>Course Hub</span></a></li>
                        {{-- Nav hidden; routes still work: /blog, /faqs, /membership_plans --}}
                        {{-- <li><a href="{{ route('Blog') }}" class="{{ request()->routeIs('Blog') || request()->routeIs('BlogDetail') ? 'active' : '' }}"><span>Blog</span></a></li> --}}
                        <li><a href="{{ route('about') }}"><span>About us</span></a></li>
                        <li><a href="{{ route('Contact') }}"><span>Contact us</span></a></li>
                        {{-- <li><a href="{{ route('faqs') }}"><span>FAQs</span></a></li> --}}
                        {{-- <li><a href="{{ route('membership') }}"><span>Membership plans</span></a></li> --}}
                    </ul>
                </li>
                {{-- Nav hidden; /zoom still works --}}
                {{-- <li>
                    <a href="{{ route('Zoom') }}" class="{{ request()->routeIs('Zoom') ? 'active' : '' }}"><span>Zoom Meetings</span></a>
                </li> --}}
                <li>
                    <a href="{{ route('cart.index') }}"><span>Cart</span></a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="offcanvas-user d-lg-none">
        @auth
            <div class="offcanvas-user__button">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-hover-primary w-100 text-center">Dashboard</a>
            </div>
            <div class="offcanvas-user__button">
                <a href="{{ route('logout') }}" class="btn btn-secondary btn-hover-secondarys w-100 text-center">Log out</a>
            </div>
        @else
            <div class="offcanvas-user__button">
                <button type="button" class="offcanvas-user__login btn btn-secondary btn-hover-secondarys w-100" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
            </div>
            <div class="offcanvas-user__button">
                <button type="button" class="offcanvas-user__signup btn btn-primary btn-hover-primary w-100" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
            </div>
        @endauth
    </div>
</div>
