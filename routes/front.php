<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\BaseViewController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Front\FrontPortfolioController;

Route::name('front.')->group(function (){
    Route::get('auth/facebook', [FacebookController::class, 'facebook'])->name('facebook');
    Route::get('auth/facebook/callback', [FacebookController::class, 'facebookRedirect'])->name('facebook-callback');

    Route::get('auth/google', [GoogleController::class, 'google'])->name('google');
    Route::get('auth/google/callback', [GoogleController::class, 'googleCallback'])->name('google-callback');

    Route::get('/', [BaseViewController::class, 'home'])->name('home');
    Route::get('/faq', [BaseViewController::class, 'faq'])->name('faq');
    Route::get('/about', [BaseViewController::class, 'about'])->name('about');
    Route::get('/contact', [BaseViewController::class, 'contact'])->name('contact');
    Route::get('/privacy-policy', [BaseViewController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms-and-conditions', [BaseViewController::class, 'termsAndConditions'])->name('terms-and-conditions');

    Route::get('/blogs/{blog_category_id}/{title?}', [BaseViewController::class, 'blogs'])->name('blogs');
    Route::get('/blog-details/{blog_id}/{title?}', [BaseViewController::class, 'blogDetails'])->name('blog-details');

    Route::get('/portfolios', [FrontPortfolioController::class, 'portfolios'])->name('portfolios');
    Route::get('/portfolio-details/{portfolio_id}/{title?}', [FrontPortfolioController::class, 'portfolioDetails'])->name('portfolio-details');

    Route::get('/our-services/{our_service_category_id}/{title?}', [BaseViewController::class, 'services'])->name('our-services');
    Route::get('/our-service-details/{our_service_id}/{title?}', [BaseViewController::class, 'serviceDetails'])->name('our-service-details');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {});
});
