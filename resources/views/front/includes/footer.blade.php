<!-- Start Footer & Subscribe Section -->
<section class="footer-subscribe-wrapper">
    <!-- Start Subscribe Section -->
    <div class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="subscribe-content">
                        <h2>Sign Up Our Newsletter</h2>
                        <p>We Offer An Informative Monthly Technology Newsletter - Check It Out.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form class="newsletter-form" method="post" action="{{ route('admin.newsletters.store') }}">
                        @csrf
                        <input type="email" class="input-newsletter" name="email" placeholder="Enter Your Email" required autocomplete="off">
                        <button type="submit">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Section -->
    <!-- Start Footer Section -->
    <div class="footer-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($siteSettings as $siteSetting)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <a class="footer-logo" href="{{ route('front.home') }}">
    {{--                            <img src="{{ asset('/') }}front/assets/img/logo.png" class="white-logo" alt="logo">--}}
                                <h3 class="text-white">SM Technology</h3>
                            </a>
                            <p>{!! substr($siteSetting->footer_description, 0, 200) !!}</p>
                            <ul class="footer-social">
                                <li>
                                    <a href="{{ $siteSetting->fb_link }}"> <i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $siteSetting->twitter_link }}"> <i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $siteSetting->youtube_link }}"> <i class="fab fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $siteSetting->linkedin_link }}"> <i class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Our Services</h3>
                        </div>
                        <ul class="footer-quick-links">
                            @foreach($ourServiceCategories as $ourServiceCategory)
                                @if($ourServiceCategory->ourServices->count() > 0)
                                    <li><a href="{{ route('front.our-services', ['our_service_category_id' => $ourServiceCategory->id, 'title' => str_replace(' ', '-', $ourServiceCategory->name)]) }}">{{ $ourServiceCategory->name ?? '' }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul class="footer-quick-links">
                            <li><a href="{{ route('front.about') }}">About Us</a></li>
                            <li><a href="{{ route('front.faq') }}">Faq</a></li>
                            <li><a href="{{ route('front.contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('front.privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('front.terms-and-conditions') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                @foreach($siteSettings as $siteSetting)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <div class="footer-heading">
                                <h3>Contact Info</h3>
                            </div>
                            <div class="footer-info-contact">
                                <i class="flaticon-phone-call"></i>
                                <h3>Phone</h3>
                                <span><a href="tel:{{ $siteSetting->phone ?? '' }}">{{ $siteSetting->phone ?? '' }}</a></span>
                            </div>
                            <div class="footer-info-contact">
                                <i class="flaticon-envelope"></i>
                                <h3>Email</h3>
                                <span><a href="mailto:{{ $siteSetting->email ?? '' }}">{{ $siteSetting->email ?? '' }}</a></span>
                            </div>
                            <div class="footer-info-contact">
                                <i class="flaticon-placeholder"></i>
                                <h3>Address</h3>
                                <span>{!! $siteSetting->address !!}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Footer Section -->
</section>
<!-- End Footer & Subscribe Section -->

<!-- Start Copy Right Section -->
<div class="copyright-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <p><i class="far fa-copyright"></i> {{ date('Y') }} SM Technology - All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul>
                    <li><a href="{{ route('front.terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('front.privacy-policy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copy Right Section -->
