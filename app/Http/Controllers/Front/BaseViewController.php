<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalFeaturesManagement\ClientFeedback;
use App\Models\Admin\AdditionalFeaturesManagement\ExpertTeamMember;
use App\Models\Admin\AdditionalFeaturesManagement\OurCustomer;
use App\Models\Admin\AdditionalFeaturesManagement\SiteSettings;
use App\Models\Admin\BlogManagement\Blog;
use App\Models\Admin\BlogManagement\BlogCategory;
use App\Models\Admin\HomePageManagement\HomePageCounter;
use App\Models\Admin\HomePageManagement\HomePageQualityServiceRating;
use App\Models\Admin\PortfolioManagement\Portfolio;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use App\Models\Admin\ServiceManagement\OurService;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Http\Request;

class BaseViewController extends Controller
{
    protected
        $ourServiceCategories = [],
        $ourServiceCategory,
        $ourServices = [],
        $ourService,
        $portfolioCategories = [],
        $portfolios = [],
        $portfolio,
        $blogCategories = [],
        $blogs = [],
        $blog,
        $clientFeedbacks = [],
        $expertTeamMembers = [],
        $ourCustomers = [],
        $homePageCounters = [],
        $homePageQualityServiceRatings = [],
        $siteSetting;

    public function home()
    {
        $this->homePageQualityServiceRatings     = HomePageQualityServiceRating::where('status', 1)->latest()->get(['id', 'title', 'rating']);
        $this->ourServiceCategories              = OurServiceCategory::where('status', 1)->latest()->get(['id', 'name', 'description', 'icon_class']);
        $this->portfolioCategories               = PortfolioCategory::where('status', 1)->take(6)->latest()->get(['id', 'name']);
        $this->expertTeamMembers                 = ExpertTeamMember::where('status', 1)->latest()->get(['id', 'name', 'position', 'image', 'fb_link', 'twitter_link', 'linkedin_link']);
        $this->homePageCounters                  = HomePageCounter::where('status', 1)->latest()->get(['id', 'title', 'counter_number']);
        $this->clientFeedbacks                   = ClientFeedback::where('status', 1)->latest()->get(['id', 'client_name', 'feedback', 'total_rating', 'user_image']);
        $this->ourCustomers                      = OurCustomer::where('status', 1)->latest()->get(['id', 'company_logo']);
        $this->siteSetting                       = SiteSettings::all();
        $this->portfolios                        = Portfolio::where('status', 1)->take(6)->latest()->get();
        $this->blogs                             = Blog::where('status', 1)->take(6)->latest()->get(['id', 'title', 'user_id', 'main_image', 'created_at', 'short_description']);
        $this->ourServiceCategory                = OurServiceCategory::where('status', 1)->latest()->get(['id', 'name']);

        return view('front.home.index', [
            'homePageQualityServiceRatings' => $this->homePageQualityServiceRatings,
            'ourServiceCategories'          => $this->ourServiceCategories,
            'portfolioCategories'           => $this->portfolioCategories,
            'expertTeamMembers'             => $this->expertTeamMembers,
            'homePageCounters'              => $this->homePageCounters,
            'clientFeedbacks'               => $this->clientFeedbacks,
            'ourCustomers'                  => $this->ourCustomers,
            'siteSettings'                  => $this->siteSetting,
            'portfolios'                    => $this->portfolios,
            'blogs'                         => $this->blogs,
            'ourServiceCategory'            => $this->ourServiceCategory
        ]);
    }
    public function about()
    {
        $this->homePageQualityServiceRatings     = HomePageQualityServiceRating::where('status', 1)->latest()->get(['id', 'title', 'rating']);
        $this->expertTeamMembers                 = ExpertTeamMember::where('status', 1)->latest()->get(['id', 'name', 'position', 'image', 'fb_link', 'twitter_link', 'linkedin_link']);
        $this->homePageCounters                  = HomePageCounter::where('status', 1)->latest()->get(['id', 'title', 'counter_number']);
        $this->clientFeedbacks                   = ClientFeedback::where('status', 1)->latest()->get(['id', 'client_name', 'feedback', 'total_rating', 'user_image']);
        $this->ourCustomers                      = OurCustomer::where('status', 1)->latest()->get(['id', 'company_logo']);
        $this->siteSetting                       = SiteSettings::all();

        return view('front.about.index', [
            'homePageQualityServiceRatings' => $this->homePageQualityServiceRatings,
            'expertTeamMembers'             => $this->expertTeamMembers,
            'homePageCounters'              => $this->homePageCounters,
            'clientFeedbacks'               => $this->clientFeedbacks,
            'ourCustomers'                  => $this->ourCustomers,
            'siteSettings'                  => $this->siteSetting,
        ]);
    }
    public function contact()
    {
        return view('front.contact.index');
    }
    public function faq()
    {
        return view('front.faq.index');
    }
    public function termsAndConditions()
    {
        return view('front.terms-and-conditions.index');
    }
    public function privacyPolicy()
    {
        return view('front.privacy-policy.index');
    }
    public function blogs($blogCategoryId)
    {
//        $this->blogs    = Blog::where('blog_category_id', $this->blog->blog_category_id)->where('blog_category_id', '!=', $blogCategoryId)->latest()->get();
        return view('front.blogs.index', [
            'blogCategory'  => BlogCategory::select(['id', 'name'])->find($blogCategoryId),
            'blogs'         => Blog::where([
                'blog_category_id'  => $blogCategoryId,
                'status'            => 1,
            ])->get(),
//            'relatedBlogs'  => $this->blogs,
            'blogCategories' => BlogCategory::withCount('blogs')->where('status', 1)->latest()->get(['id', 'name']),
        ]);
    }

    public function blogDetails($blogId)
    {
        $this->blog             = Blog::find($blogId);
        $this->blogs            = Blog::where('blog_category_id', $this->blog->blog_category_id)->where('id', '!=', $blogId)->latest()->get();
        $this->blogCategories   = BlogCategory::withCount('blogs')->where('status', 1)->latest()->get();
        return view('front.blogs.blog-details', [
            'blog'              => $this->blog,
            'relatedBlogs'      => $this->blogs,
            'blogCategories'    => $this->blogCategories,
        ]);
    }

    public function services($ourServiceCategoryId)
    {
        $this->ourServices          = OurService::where([
            'our_service_category_id'   => $ourServiceCategoryId,
            'status'                    => 1,])->latest()->get();
        $this->siteSetting          = SiteSettings::all();
        return view('front.services.index', [
            'ourServiceCategory'    => OurServiceCategory::select(['id', 'name'])->find($ourServiceCategoryId),
            'ourServices'           => $this->ourServices,
            'siteSettings'          => $this->siteSetting,
        ]);
    }

    public function serviceDetails($ourServiceId)
    {
        $this->ourService           = OurService::find($ourServiceId);
        $this->ourServiceCategories = OurServiceCategory::withCount('ourServices')->where('status', 1)->latest()->get();
        return view('front.services.service-details', [
            'ourServiceCategories'  => $this->ourServiceCategories,
            'ourService'            => $this->ourService,
        ]);
    }
}
