@extends('front.master')

@section('title', 'Home')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a>
                            </li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Contact Section -->
    <div class="contact-section section-padding">
        <div class="container">
            <div class="section-title">
                <h6 class="sub-title">Let's Talk</h6>
                <h2>Contact Us</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact-form">
                        <p class="form-message"></p>
{{--                        <form id="contact-form" class="contact-form form" action="https://cutesolution.com/html/techvio/phpmails.php" method="POST">--}}
                        <form id="contact-form" class="contact-form form" action="{{ route('admin.contacts.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mobile" id="phone" required class="form-control" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="subject" class="form-control" required placeholder="Your Subject">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="6" required placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn submit-btn">Send Message <span></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Section -->

    <!-- Start Contact Info Section -->
    <section class="contact-info-wrapper bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6 class="sub-title">Find Us</h6>
                        <h2>Contact Info</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-content">
                        <h5>USA Headquarter</h5>
                        <p>304 NW St Homestead, Florida, Melrose Street, Water Mill, 76B Overlook Drive Chester, PA 19013, Flemingsburg USA.</p>
                        <a href="tel:12345678">080 707 555-321</a>
                        <a href="mailto:demo@example.com">demo@example.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-content">
                        <h5>New York Office</h5>
                        <p>1540 Pecks Ridge Tilton Rd Flemingsburg, Kentucky(KY), 4104188 Fulton Street Blackwood, NJ 08012, London.</p>
                        <a href="tel:12345678">080 707 555-321</a>
                        <a href="mailto:demo@example.com">demo@example.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-content">
                        <h5>Panama Office</h5>
                        <p>103 Richard Ave Ashville, Ohio, Water Mill,3468 16th Hwy Pangburn, Arkansas(AR), Charolais Ashville, Virginia, Panama.</p>
                        <a href="tel:12345678">080 707 555-321</a>
                        <a href="mailto:demo@example.com">demo@example.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->

    <!-- Start Map Section -->
    <div class="map-area">
        <div class="map-content">
            <div class="map-canvas" id="contact-map"></div>
        </div>
    </div>
    <!-- End Map Section -->
@endsection
