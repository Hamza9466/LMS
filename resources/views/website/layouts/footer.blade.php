<!-- Footer Start -->
<div class="footer-section bg-color-10">

    <!-- Footer Widget Area Start -->
    <div class="footer-widget-area section-padding-01">
        <div class="container">
            <div class="row gy-6">

                <div class="col-md-4">
                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <a class="header-logo__logo" href="index.html"> <img src="{{ asset('assets/website/images/home/white-logo.webp') }}"
     alt="Logo" width="150" height="32"></a>

                        <div class="footer-widget__info">
                            <span class="title">Call us</span>
                            <span class="number">800 388 80 90</span>
                        </div>
                        <div class="footer-widget__info">
                            <p>58 Howard Street #2 San Francisco</p>
                            <p>contact@edumall.com</p>
                        </div>

                        <div class="footer-widget__social-02">
                            <a class="twitter" href="https://twitter.com/" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="skype" href="#" target="_blank"><i class="fab fa-skype"></i></a>
                            <a class="youtube" href="https://www.youtube.com/" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                            <a class="linkedin" href="https://www.linkedin.com/" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <!-- Footer Widget End -->
                </div>

                <div class="col-md-8">
                    <div class="row gy-6">

                        <div class="col-sm-4">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">About</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="course-grid-left-sidebar.html">Courses</a></li>
                                    <li><a href="instructors.html">Instructor</a></li>
                                    <li><a href="event-grid-sidebar.html">Events</a></li>
                                    <li><a href="become-an-instructor.html">Become A Teacher</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-sm-4">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Links</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="blog-grid-left-sidebar.html">News & Blogs</a></li>
                                    <li><a href="#">Library</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Partners</a></li>
                                    <li><a href="#">Career</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                        <div class="col-sm-4">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget__title">Support</h4>

                                <ul class="footer-widget__link">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="faqs.html">FAQs</a></li>
                                    <li><a href="#">Forum</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Widget Area End -->

    <!-- Footer Copyright Area End -->
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-wrapper text-center">
                <ul class="footer-widget__link flex-row gap-8 justify-content-center">
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="footer-widget__copyright mt-0">&copy; 2023 <span> EduMall </span> Made with <i
                        class="fa fa-heart"></i> by <a
                        href="https://1.envato.market/c/417168/275988/4415?subId1=hastheme&subId2=demo&subId3=https%3A%2F%2Fthemeforest.net%2Fuser%2Fbootxperts%2Fportfolio&u=https%3A%2F%2Fthemeforest.net%2Fuser%2Fbootxperts%2Fportfolio">BootXperts</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer Copyright Area End -->

</div>
<!-- Footer End -->

<!--Back To Start-->
<button id="backBtn" class="back-to-top backBtn">
    <i class="arrow-top fas fa-arrow-up"></i>
    <i class="arrow-bottom fas fa-arrow-up"></i>
</button>
<!--Back To End-->


</main>

<!-- Log In Modal Start -->
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-dialog-centered modal-login">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>

            <!-- Modal Content Start -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <p class="modal-description">Don't have an account yet? <button data-bs-toggle="modal"
                            data-bs-target="#registerModal">Sign up for free</button></p>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="modal-form">
                            <label class="form-label">Username or email</label>
                            <input type="text" name="login" class="form-control"
                                placeholder="Your username or email" required>
                        </div>
                        <div class="modal-form">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required>
                        </div>
                        <div class="modal-form d-flex justify-content-between flex-wrap gap-2">
                            <div class="form-check">
                                <input type="checkbox" id="rememberme" name="remember">
                                <label for="rememberme">Remember me</label>
                            </div>
                            <div class="text-end">
                                <a class="modal-form__link" href="#">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="modal-form">
                            <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Log In</button>
                        </div>
                    </form>


                    <div class="modal-social-option">
                        <p>or Log-in with</p>

                        <ul class="modal-social-btn">
                            <li><a href="#" class="btn facebook"><i class="fab fa-facebook-square"></i>
                                    Gacebook</a>
                            </li>
                            <li><a href="#" class="btn google"><i class="fab fa-google"></i> Google</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Modal Content End -->

        </div>
        <!-- Modal Wrapper End -->

    </div>
</div>
<!-- Log In Modal End -->

<!-- Log In Modal Start -->
<div class="modal fade" id="registerModal">
    <div class="modal-dialog modal-dialog-centered modal-register">

        <!-- Modal Wrapper Start -->
        <div class="modal-wrapper">
            <button class="modal-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>

            <!-- Modal Content Start -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <p class="modal-description">Already have an account? <button data-bs-toggle="modal"
                            data-bs-target="#loginModal">Log in</button></p>
                </div>
                <div class="modal-body">

                    <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">

                            <!-- First Name -->
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                    placeholder="First Name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                    value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="col-md-6">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username"
                                    value="{{ old('username') }}" required>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Your Email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <label class="form-label">Re-Enter Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Re-Enter Password" required>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control"
                                    value="{{ old('dob') }}">
                                @error('dob')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Country -->
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control"
                                    value="{{ old('country') }}">
                                @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Institute Name -->
                            <div class="col-md-6">
                                <label class="form-label">Institute Name</label>
                                <input type="text" name="institute_name" class="form-control"
                                    value="{{ old('institute_name') }}">
                                @error('institute_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Program Name -->
                            <div class="col-md-6">
                                <label class="form-label">Program Name</label>
                                <input type="text" name="program_name" class="form-control"
                                    value="{{ old('program_name') }}">
                                @error('program_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Enrollment Year -->
                            <div class="col-md-6">
                                <label class="form-label">Enrollment Year</label>
                                <input type="text" name="enrollment_year" class="form-control"
                                    value="{{ old('enrollment_year') }}">
                                @error('enrollment_year')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Profile Image -->
                            <div class="col-md-6">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control">
                                @error('profile_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Terms -->
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" id="privacy" name="terms" class="form-check-input"
                                        {{ old('terms') ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="privacy">Accept the Terms and Privacy
                                        Policy</label>
                                    @error('terms')
                                        <small class="text-danger d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">Register</button>
                            </div>
                        </div>
                    </form <!-- Modal Content End -->

                </div>
                <!-- Modal Wrapper End -->

            </div>
        </div>
        <!-- Log In Modal End -->
