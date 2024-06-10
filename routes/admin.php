<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\AdditionalFeaturesManagement\SiteSettingController;
use App\Http\Controllers\Admin\AdditionalFeaturesManagement\OurCustomerController;
use App\Http\Controllers\Admin\AdditionalFeaturesManagement\ClientFeedbackController;
use App\Http\Controllers\Admin\AdditionalFeaturesManagement\ExpertTeamMemberController;
use App\Http\Controllers\Admin\AdditionalFeaturesManagement\NewsletterController;
use App\Http\Controllers\Admin\BlogManagement\BlogCategoryController;
use App\Http\Controllers\Admin\BlogManagement\BlogController;
use App\Http\Controllers\Admin\HomePageManagement\HomePageCounterController;
use App\Http\Controllers\Admin\HomePageManagement\HomePageQualityServiceRatingController;
use App\Http\Controllers\Admin\HomePageManagement\HomePageSliderController;
use App\Http\Controllers\Admin\ServiceManagement\OurServiceCategoryController;
use App\Http\Controllers\Admin\ServiceManagement\OurServiceController;
use App\Http\Controllers\Admin\PortfolioManagement\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioManagement\PortfolioController;
use App\Http\Controllers\Admin\RoleManagement\RoleController;
use App\Http\Controllers\Admin\RoleManagement\PermissionCategoryController;
use App\Http\Controllers\Admin\RoleManagement\PermissionController;
use App\Http\Controllers\Admin\RoleManagement\UserController;
use App\Http\Controllers\Front\Contact\ContactController;
//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');

    Route::prefix('admin')->group(function (){
        Route::resources([
            'expert-team-members'                   => ExpertTeamMemberController::class,
            'client-feedbacks'                      => ClientFeedbackController::class,
            'site-settings'                         => SiteSettingController::class,
            'our-customers'                         => OurCustomerController::class,
            'newsletters'                           => NewsletterController::class,
            'contacts'                              => ContactController::class,

            'blog-categories'                       => BlogCategoryController::class,
            'blogs'                                 => BlogController::class,

            'home-page-quality-service-ratings'     => HomePageQualityServiceRatingController::class,
            'home-page-counters'                    => HomePageCounterController::class,
            'home-page-sliders'                     => HomePageSliderController::class,

            'our-service-categories'                => OurServiceCategoryController::class,
            'our-services'                          => OurServiceController::class,

            'portfolio-categories'                  => PortfolioCategoryController::class,
            'portfolios'                            => PortfolioController::class,

            'permission-categories'                 => PermissionCategoryController::class,
            'permissions'                           => PermissionController::class,
            'roles'                                 => RoleController::class,
            'users'                                 => UserController::class,
        ]);
    });
});
