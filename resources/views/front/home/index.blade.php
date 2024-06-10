@extends('front.master')

@section('title', 'Home')

@section('body')
    <!-- Start Home Section -->
    <div class="home-4 home-area">
        <div id="particles-js"></div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="main-banner-content">
                                <h1>IT Solutions & Business Services Company</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor magna aliqua, magna aliqua. ipsum is simply dummy text of the printing.</p>
                                <div class="banner-btn">
                                    <a class="default-btn-one" href="{{ route('front.our-services', ['our_service_category_id' => $ourServiceCategory[0]->id, 'title' => str_replace(' ', '-', $ourServiceCategory[0]->name)]) }}">Our Service <span></span></a>
                                    <a class="default-btn-two" href="{{ route('front.contact') }}">Contact Us <span></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="banner-image">
                                <img src="{{ asset('/') }}front/assets/img/home-font-2.png" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home Section -->

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
                            <a class="default-btn" href="{{ route('front.about') }}">Learn More <span></span></a>
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

    <!-- Start Services Section -->
    <section class="services-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6 class="sub-title">What We Provide</h6>
                        <h2>Our Services</h2>
                    </div>
                </div>
                @foreach($ourServiceCategories->take(6) as $ourServiceCategory)
                    @if($ourServiceCategory->ourServices->count() > 0)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-services-item">
                                <div class="services-icon">
                                    <i class="{{ $ourServiceCategory->icon_class ?? 'flaticon-project-management' }}"></i>
                                </div>
                                <h3>{{ $ourServiceCategory->name ?? '' }}</h3>
                                <p>{!! substr($ourServiceCategory->description, 0, 200) !!}...</p>
                                <div class="services-btn">
                                    <a href="{{ route('front.our-services', ['our_service_category_id' => $ourServiceCategory->id, 'title' => str_replace(' ', '-', $ourServiceCategory->name)]) }}" class="read-more"><i class="bi bi-arrow-right-short"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- Start Portfolio Section -->
    <section class="portfolio-area bg-grey section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6 class="sub-title">Recent Works</h6>
                        <h2>Our Portfolio</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="portfolio-list">
                        <ul class="nav" id="portfolio-flters">
                            <li class="filter filter-active" data-filter="*">all</li>
                            @foreach($portfolioCategories as $portfolioCategory)
                                <li class="filter" data-filter=".cat{{ $portfolioCategory->id }}">{{ $portfolioCategory->name }}</li>
                            @endforeach
{{--                            <li class="filter" data-filter=".application">application</li>--}}
{{--                            <li class="filter" data-filter=".webdesign">web design</li>--}}
{{--                            <li class="filter" data-filter=".photography">photography</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portfolio-container">
                <div class="row">
                    <!-- portfolio-item -->
{{--                    @foreach($portfolioCategories as $portfolioCategory)--}}
{{--                        @foreach($portfolioCategory->portfolios as $portfolio)--}}
                        @foreach($portfolios as $portfolio)
                            <div class="col-lg-4 col-md-6 portfolio-grid-item all cat{{ $portfolioCategory->id }}">
                                <div class="portfolio-item">
                                    @if($portfolio->image)
                                        <img src="{{ asset($portfolio->image) }}" alt="image" class="portfolio_image">
                                    @else
                                        <img src="{{ asset('/') }}front/assets/img/portfolio/portfolio-1.jpg" alt="image">
                                    @endif
                                    <div class="portfolio-content-overlay">
{{--                                        <p>App Store | Social Media</p>--}}
                                        <h3><a href="{{ route('front.portfolio-details', ['portfolio_id' => $portfolio->id, 'title' => str_replace(' ', '-' ,$portfolio->title)]) }}">{{ $portfolio->title ?? '' }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- Start Pricing Section -->
{{--    <section class="price-area pt-100 pb-70">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h6 class="sub-title">Popular Package</h6>--}}
{{--                        <h2>Pricing Plans</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="single-pricing-content">--}}
{{--                        <div class="price-tag">--}}
{{--                            <h3>Startup</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price-heading">--}}
{{--                            <div class="price-usd">--}}
{{--                                <h2>$29.00 <span class="price-small-text">- Per month</span></h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="price-body">--}}
{{--                            <ul>--}}
{{--                                <li>Personal Use</li>--}}
{{--                                <li>Unlimited Projects</li>--}}
{{--                                <li>Project Management</li>--}}
{{--                                <li class="offer-list-none"><del>27/7 Support</del></li>--}}
{{--                                <li class="offer-list-none"><del>Basic support on Github</del></li>--}}
{{--                                <li class="offer-list-none"><del>Help center access</del></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="price-btn">--}}
{{--                            <a href="#" class="price-btn-one">Get Started</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="single-pricing-content">--}}
{{--                        <div class="price-tag">--}}
{{--                            <h3>Standard</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price-heading">--}}
{{--                            <div class="price-usd">--}}
{{--                                <h2>$45.00<span class="price-small-text">- Per month</span></h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="price-body">--}}
{{--                            <ul>--}}
{{--                                <li>Personal Use</li>--}}
{{--                                <li>Unlimited Projects</li>--}}
{{--                                <li>Project Management</li>--}}
{{--                                <li>27/7 Support</li>--}}
{{--                                <li class="offer-list-none"><del>Basic support on Github</del></li>--}}
{{--                                <li class="offer-list-none"><del>Help center access</del></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="price-btn">--}}
{{--                            <a href="#" class="price-btn-one">Get Started</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="single-pricing-content">--}}
{{--                        <div class="price-tag">--}}
{{--                            <h3>Premium</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price-heading">--}}
{{--                            <div class="price-usd">--}}
{{--                                <h2>$75.00<span class="price-small-text">- Per month</span></h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="price-body">--}}
{{--                            <ul>--}}
{{--                                <li>Personal Use</li>--}}
{{--                                <li>Unlimited Projects</li>--}}
{{--                                <li>Project Management</li>--}}
{{--                                <li>27/7 Support</li>--}}
{{--                                <li>Basic support on Github</li>--}}
{{--                                <li>Help center access</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="price-btn">--}}
{{--                            <a href="#" class="price-btn-one">Get Started</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- End Pricing Section -->

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

    <!-- Start Testimonial Section -->
    <section class="testimonial-section pt-100 pb-50">
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

    <!-- Start Blog Section -->
    <section class="blog-section bg-grey pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6 class="sub-title">Blog & Article</h6>
                        <h2>Recent Blog</h2>
                    </div>
                </div>
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single-item">
                            <div class="blog-image">
                                <a href="{{ route('front.blog-details', ['blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title)]) }}">
                                    <img src="{{ asset(!empty($blog->main_image) ? $blog->main_image : 'front/assets/img/blog/blog-1.jpg') }}" alt="image" style="height: 288px">
                                </a>
                            </div>
                            <div class="blog-description">
                                <ul class="blog-info">
                                    <li>
                                        <a href="javascript:void(0)"><i class="bi bi-person-circle"></i> {{ $blog->authorName->name }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="bi bi-calendar-check"></i> {{ $blog->created_at->format('d M Y') }}</a>
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    <h3>
                                        <a href="{{ route('front.blog-details', ['blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title)]) }}">
                                            {{ str()->words($blog->title, 7, '...') }}
                                        </a>
                                    </h3>
                                    <p>{!! substr($blog->short_description, 0, 120) !!}...</p>
                                    <div class="blog-btn"> <a href="{{ route('front.blog-details', ['blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title)]) }}" class="read-more"><i class="bi bi-arrow-right-short"></i> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog Section -->

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

@push('style')
    <style>
        .portfolio_image {
            height: 408px;
        }
    </style>
@endpush
