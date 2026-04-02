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
