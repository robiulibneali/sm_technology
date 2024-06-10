@extends('front.master')

@section('title', 'Portfolio Details')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Portfolios Details</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li>Portfolios Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Portfolio Details Section -->
    <section class="portfolio-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="portfolio-details-image">
                        @if(isset($portfolio->image))
                            <img src="{{ asset($portfolio->image) }}" alt="portfolio_image">
                        @else
                            <img src="{{ asset('/') }}front/assets/img/portfolio/portfolio-details-1.jpg" alt="image">
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="portfolios-details-desc">
                        <h3>{{ $portfolio->title ?? 'Portfolio Title' }}</h3>
                        <p>{!! $portfolio->short_description !!}</p>
                        <div class="features-text">
                            <p>{!! $portfolio->long_description !!}</p>
                        </div><div class="portfolio-details-info">
                            <div class="single-info-box">
                                <h4>Author</h4>
                                <span>{{ $portfolio->author_name ?? 'author_name' }}</span>
                            </div>
                            <div class="single-info-box">
                                <h4>Category</h4>
                                <span>Virtual, Technology</span>
                            </div>
                            <div class="single-info-box">
                                <h4>Date</h4>
                                <span>{{ $portfolio->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="single-info-box">
                                <h4>Share</h4>
                                <ul class="social">
                                    <li><a href="{{ $portfolio->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $portfolio->twitter_link }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $portfolio->instagram_link }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $portfolio->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="single-info-box">
                                <h4>Works Preview</h4>
                                <a href="#" class="default-btn">Live Preview <span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->
@endsection
