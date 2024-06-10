@extends('front.master')

@section('title', 'Blogs')

@section('body')
    <!-- Start Page Title Section -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Portfolio</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Portfolio Section -->
    <section class="portfolio-area section-padding">
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
{{--                            <li class="filter filter-active" data-filter=".all">all</li>--}}

                            @foreach($portfolioCategories as $portfolioCategory)
                                <li class="filter" data-filter=".branding-{{ $portfolioCategory->id }}">{{ $portfolioCategory->name ?? 'Portfolio Category Name' }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portfolio-container">
                <div class="row">
                    <!-- portfolio-item -->

                    @foreach($portfolioCategories as $key=>$singlePortfolioCategory)
                        @foreach($singlePortfolioCategory->portfolios as $portfolio)
                            <div class="col-lg-4 col-md-6 portfolio-grid-item all branding-{{ $singlePortfolioCategory->id }}">
                                <div class="portfolio-item">
                                    @if(isset($portfolio->pivot->image))
                                        <img src="{{ asset($portfolio->pivot->image) }}" alt="Portfolio Image" class="portfolio_image">
                                    @else
                                        <img src="{{ asset('/') }}front/assets/img/portfolio/portfolio-1.jpg" alt="image">
                                    @endif
                                    <div class="portfolio-content-overlay">
                                        {{--                                    <p>App Store | Social Media</p>--}}
                                        <h3><a href="{{ route('front.portfolio-details', ['portfolio_id' => $portfolio->id, 'title' => str_replace(' ', '-' ,$portfolio->title)]) }}">{{ $portfolio->title ?? 'Portfolio Title' }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
@endsection

@push('style')
    <style>
        .portfolio_image {
            height: 408px;
        }
    </style>
@endpush
