<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    @include('front.includes.assets.meta')
    <!-- Title -->
    <title>SM Technology - @yield('title')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('/') }}front/assets/img/favicon.png">
    @include('front.includes.assets.style')
</head>

<body>

<!-- Start Preloader Section -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Section -->

<!-- Start Navbar Section -->
@include('front.includes.navbar')
<!-- End Navbar Section -->

@yield('body')

@include('front.includes.footer')

<!-- Start Go Top Section -->
<div class="go-top">
    <i class="fas fa-chevron-up"></i>
    <i class="fas fa-chevron-up"></i>
</div>
<!-- End Go Top Section -->

@include('front.includes.assets.script')

</body>
</html>
