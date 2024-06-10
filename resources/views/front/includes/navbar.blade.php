<div class="navbar-area">
    <div class="techvio-responsive-nav">
        <div class="container">
            <div class="techvio-responsive-menu">
                <div class="logo">
                    <a href="{{ route('front.home') }}">
{{--                        <img src="{{ asset('/') }}front/assets/img/logo.png" class="white-logo" alt="logo">--}}
{{--                        <img src="{{ asset('/') }}front/assets/img/logo-black.png" class="black-logo" alt="logo">--}}
                        <h4 class="white-logo text-white">SM Technology</h4>
                        <h4 class="black-logo text-black">SM Technology</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="techvio-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('front.home') }}">
{{--                    <img src="{{ asset('/') }}front/assets/img/logo.png" class="white-logo" alt="logo">--}}
{{--                    <img src="{{ asset('/') }}front/assets/img/logo-black.png" class="black-logo" alt="logo">--}}
                    <h4 class="white-logo text-white">SM Technology</h4>
                    <h4 class="black-logo text-black">SM Technology</h4>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('front.home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Services<i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                @foreach($ourServiceCategories as $ourServiceCategory)
                                    @if($ourServiceCategory->ourServices->count() > 0)
                                        <li class="nav-item"><a href="{{ route('front.our-services', ['our_service_category_id' => $ourServiceCategory->id, 'title' => str_replace(' ', '-', $ourServiceCategory->name)]) }}" class="nav-link">{{ $ourServiceCategory->name ?? '' }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.portfolios') }}" class="nav-link">Portfolios</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">Blogs<i class="fas fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                @foreach($blogCategories as $blogCategory)
                                    @if($blogCategory->blogs->count() > 0)
                                        <li class="nav-item"><a href="{{ route('front.blogs', ['blog_category_id' => $blogCategory->id, 'title' => str_replace(' ', '-', $blogCategory->name)]) }}" class="nav-link">{{ $blogCategory->name ?? '' }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.contact') }}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.about') }}" class="nav-link">About Us</a>
                        </li>
                    </ul>
                    <div class="other-option">
                        @foreach($siteSettings as $siteSetting)
                        <a class="default-btn" href="mailto:{{ $siteSetting->email ?? '' }}">Get It Support <span></span></a>
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

@push('style')

@endpush
