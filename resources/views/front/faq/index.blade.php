@extends('front.master')

@section('title', 'Home')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Frequently Ask Question</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li>Faq</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Faq Section -->
    <section class="faq-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="faq-accordion first-faq-box">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title active" href="javascript:void(0)"> <i class="fa fa-plus"></i> How long does a website redesign take?</a>
                                <p class="accordion-content show">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> What happens if my site breaks?</a>
                                <p class="accordion-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> What is the difference between my CMS, DNS, hosting, FTP, etc.?</a>
                                <p class="accordion-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> Can you handle ongoing maintenance?</a>
                                <p class="accordion-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> Do you only create WordPress websites?</a>
                                <p class="accordion-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"> <i class="fa fa-plus"></i> Can I update the website myself once it’s built?</a>
                                <p class="accordion-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq Section -->
@endsection
