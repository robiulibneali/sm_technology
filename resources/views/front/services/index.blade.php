@extends('front.master')

@section('title', 'Our Services')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Services</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            @if($ourServiceCategory)
                                <li>{{ $ourServiceCategory->name }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Services Section -->
    <section class="services-section section-padding">
        <div class="container">
            <div class="row">
                @foreach($ourServices as $ourService)
                <div class="col-lg-4 col-md-6">
                    <div class="single-services-item">
                        <div class="services-icon">
                            <i class="{{ $ourService->icon_class ?? '' }}"></i>
                        </div>
                        <h3>{{ $ourService->title ?? '' }}</h3>
                        <p>{!! substr($ourService->short_description, 0, 200) !!}...</p>
                        <div class="services-btn">
                            <a href="{{ route('front.our-service-details', ['our_service_id' => $ourService->id, 'title' => str_replace(' ', '-', $ourService->title)]) }}" class="read-more"><i class="bi bi-arrow-right-short"></i> Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Section -->

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
                            @foreach($siteSettings as $siteSetting)
                                <a class="default-btn" href="tel:{{ $siteSetting->phone ?? '' }}">Call Now<span></span></a>
                            @endforeach
                            <a class="default-btn-one" href="{{ route('front.contact') }}">Contact Us<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hire Section -->

    <!-- Start Overview Section -->
    <section class="overview-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="overview-image">
                        <img src="{{ asset('/') }}front/assets/img/choose-1.jpg" alt="image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="overview-content">
                        <h6 class="sub-title">Why Choose Us?</h6>
                        <h2>Safeguard Your Brand with Cyber Security and IT Solutions</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul class="features-list">
                            <li> <span>Remote IT Assistance</span></li>
                            <li> <span>Cloud Services</span></li>
                            <li> <span>Managed IT Service</span></li>
                            <li> <span>IT Security Services</span></li>
                            <li> <span>Practice IT Management</span></li>
                            <li> <span>Solving IT Problems</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Overview Section -->

    <!-- Start Overview Section -->
    <section class="overview-section pt-70 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="overview-content">
                        <h6 class="sub-title">WHY TRUST US?</h6>
                        <h2>Achieve Digital Transformation For Your Retail Business Services</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul class="features-list">
                            <li> <span>Protect your Business</span></li>
                            <li> <span>Network Security</span></li>
                            <li> <span>Data Security</span></li>
                            <li> <span>Small Business Owners</span></li>
                            <li> <span>Running your Business</span></li>
                            <li> <span>Network Monitoring</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="overview-image-2">
                        <img src="{{ asset('/') }}front/assets/img/choose-2.jpg" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Overview Section -->
@endsection
