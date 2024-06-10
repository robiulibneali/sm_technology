@extends('front.master')

@section('title', 'Home')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>About Us</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Feature Section -->
    <section class="feature-section pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-single-item">
                        <img src="{{ asset('/') }}front/assets/img/icon/feature-icon-1.svg" alt="icon">
                        <h3>Flexibility & Responsive</h3>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna</p>
                        <div class="feature-btn-box">
                            <a href="#" class="read-more"><i class="bi bi-arrow-right-short"></i> Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-single-item">
                        <img src="{{ asset('/') }}front/assets/img/icon/feature-icon-2.svg" alt="icon">
                        <h3>Dedicated Teams</h3>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna</p>
                        <div class="feature-btn-box">
                            <a href="#" class="read-more"><i class="bi bi-arrow-right-short"></i> Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-single-item">
                        <img src="{{ asset('/') }}front/assets/img/icon/feature-icon-3.svg" alt="icon">
                        <h3>Focusing on Business</h3>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna</p>
                        <div class="feature-btn-box">
                            <a href="#" class="read-more"><i class="bi bi-arrow-right-short"></i> Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Section -->

    <!-- Start About Section -->
    <section class="about-area section-padding">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <h6 class="sub-title">About Our Company</h6>
                        <h2>Providing Your Business With A Quality IT Service is Our Passion</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim</p>
                        <div class="skills">
                            @foreach($homePageQualityServiceRatings->take(3) as $homePageQualityServiceRating)
                                <div class="skill-item">
                                    <h6>{{ $homePageQualityServiceRating->title ?? '' }} <em>{{ $homePageQualityServiceRating->rating ?? '' }}%</em></h6>
                                    <div class="skill-progress">
                                        <div class="progres" data-value="{{ $homePageQualityServiceRating->rating ?? '' }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="about-btn-box">
                            <a class="default-btn" href="about.html">Learn More <span></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{ asset('/') }}front/assets/img/about.jpg" alt="About image">
                        <div class="years-design">
                            <h2>23</h2>
                            <h5>Years Of Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Start Counter Section -->
    <section class="counter-area section-padding">
        <div class="container">
            <div class="row">
                @foreach($homePageCounters->take(4) as $homePageCounter)
                    <div class="col-lg-3 col-md-6 counter-item">
                        <div class="single-counter">
                            <div class="counter-contents">
                                <h2>
                                    <span class="counter-number">{{ $homePageCounter->counter_number ?? '' }}</span>
                                    <span>+</span>
                                </h2>
                                <h3 class="counter-heading">{{ $homePageCounter->title ?? '' }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Counter Section -->

    <!-- Start Team Section -->
    <section class="team-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6 class="sub-title">Team Member</h6>
                        <h2>Expert Team</h2>
                    </div>
                </div>
                @foreach($expertTeamMembers as $expertTeamMember)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-team-box">
                            <div class="team-image">
                                @if($expertTeamMember->image)
                                    <img src="{{ asset($expertTeamMember->image) }}" alt="team" style="height: 344.25px">
                                @else
                                    <img src="{{ asset('/') }}front/assets/img/team/team-4.jpg" alt="team">
                                @endif
                                <div class="team-social-icon">
                                    <a href="{{ $expertTeamMember->fb_link ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $expertTeamMember->twitter_link ?? '' }}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ $expertTeamMember->linkedin_link ?? '' }}"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>{{ $expertTeamMember->name ?? '' }}</h3>
                                <span>{{ $expertTeamMember->position ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Section -->

    <!-- Start Testimonial Section -->
    <section class="testimonial-section pt-50 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6 class="sub-title">Our Testimonial</h6>
                        <h2>Client Feedback</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="testimonial-slider owl-carousel owl-theme">
                        <!-- testimonials item -->
                        @foreach($clientFeedbacks->take(6) as $clientFeedback)
                            <div class="single-testimonial">
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="testimonial-content">
                                    <p>{!! substr($clientFeedback->feedback, 0, 200) !!}</p>
                                </div>
                                <div class="avatar">
                                    @if($clientFeedback->user_image)
                                        <img src="{{ asset($clientFeedback->user_image) }}" alt="testimonial images" style="height: 90px;">
                                    @else
                                        <img src="{{ asset('/') }}front/assets/img/client/testimonial-1.jpg" alt="testimonial images">
                                    @endif
                                </div>
                                <div class="testimonial-bio">
                                    <div class="bio-info">
                                        <h3>{{ $clientFeedback->client_name ?? '' }}</h3>
                                        <span>{{ $clientFeedback->client_country ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->

    <!-- Start Hire Section -->
    <section class="hire-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12">
                    <div class="hire-content">
                        <h6 class="sub-title">Want to work with us?</h6>
                        <h2>Digitally Transform & Grow Your Business</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud consectetur voluptatem accusantium doloremque adipiscing elit.</p>
                        <div class="hire-btn">
                            @foreach($siteSettings as $siteSetting )
                                <a class="default-btn" href="tel:{{ $siteSetting->phone }}">Call Now<span></span></a>
                            @endforeach
                            <a class="default-btn-one" href="{{ route('front.contact') }}">Contact Us<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hire Section -->

    <!-- Start Partner section -->
    <section class="partner-section pt-100 pb-70">
        <div class="container">
            <div class="partner-title">
                <h6 class="sub-title">Trusted By Over 1500</h6>
                <h2>Our Customers</h2>
            </div>
            <div class="partner-list">
                @foreach($ourCustomers as $ourCustomer)
                    <div class="partner-item">
                        <a href="#0">
                            @if($ourCustomer->company_logo)
                                <img src="{{ asset($ourCustomer->company_logo) }}" alt="image" style="height: 112.67px">
                            @else
                                <img src="{{ asset('/') }}front/assets/img/partner/client-1.png" alt="image">
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Partner section -->
@endsection
