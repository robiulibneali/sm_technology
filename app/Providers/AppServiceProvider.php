<?php

namespace App\Providers;

use App\Models\Admin\AdditionalFeaturesManagement\SiteSettings;
use App\Models\Admin\BlogManagement\BlogCategory;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('front.includes.navbar', function ($view){
            $view->with([
                'siteSettings'              => SiteSettings::all(),
                'blogCategories'            => BlogCategory::where('status', 1)->latest()->get(['id', 'name']),
//                'portfolioCategories'       => PortfolioCategory::where(['status' => 1, /*'portfolio_category_id' => 0,*/])->latest()->get(['id', 'portfolio_category_id', 'name']),
                'ourServiceCategories'      => OurServiceCategory::where('status', 1)->latest()->get(['id', 'name']),
            ]);
        });

        View::composer('front.includes.footer', function ($view){
            $view->with([
                'siteSettings'          => SiteSettings::all(),
                'ourServiceCategories'  => OurServiceCategory::where('status', 1)->latest()->get(['id', 'name']),
            ]);
        });
    }
}
