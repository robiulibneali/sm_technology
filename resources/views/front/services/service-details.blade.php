@extends('front.master')

@section('title', 'Our Service Details')

@section('body')

    <!-- Start Page Title Section -->
    <div class="page-title-area item-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Services Details</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li>{{ $ourService->ourServiceCategory->name ?? '' }}</li>
                            <li>{{ $ourService->title ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Section -->

    <!-- Start Services Details Section -->
    <section class="services-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="services-details-content">
                        <div class="services-details-image">
                            <img src="{{ asset(!empty($ourService->image) ? $ourService->image : 'front/assets/img/services-details-1.jpg') }}" alt="image" style="height: 450px">
                        </div>

                        <h3>{{ $ourService->title ?? '' }}</h3>
                        <p>{!! $ourService->short_description !!}</p>

                        <div class="features-text">
                            <p>{!! $ourService->long_description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="services-widget">
                        <section class="widget widget_categories">
                            <h3 class="widget-title">Our Services</h3>
                            <ul>
                                @foreach($ourServiceCategories as $ourServiceCategory)
                                    @if($ourServiceCategory->ourServices->count() > 0)
                                        <li> <a href="{{ route('front.our-services', ['our_service_category_id' => $ourServiceCategory->id, 'title' => str_replace(' ', '-', $ourServiceCategory->name)]) }}">{{ $ourServiceCategory->name ?? '' }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </section>
{{--                        <section class="widget widget_download_btn">--}}
{{--                            <h3 class="widget-title">Company Profile</h3>--}}
{{--                            <div class="download-btn-box">--}}
{{--                                <a href="#" class="default-btn">Download PDF <span></span></a>--}}
{{--                                <a href="#" class="default-btn" >Download Word File <span></span></a>--}}
{{--                            </div>--}}
{{--                        </section>--}}
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Details Section -->
@endsection
