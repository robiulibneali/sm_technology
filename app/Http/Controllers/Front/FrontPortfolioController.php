<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogManagement\Blog;
use App\Models\Admin\BlogManagement\BlogCategory;
use App\Models\Admin\PortfolioManagement\Portfolio;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use Illuminate\Http\Request;

class FrontPortfolioController extends Controller
{
    protected
        $portfolioCategories = [],
        $portfolioCategory,
        $portfolios = [],
        $portfolio;

    public function portfolios(/*$portfolioCategoryId*/)
    {
//        $this->portfolioCategory    = PortfolioCategory::selecet(['id', /*'portfolio_category_id',*/ 'name'])->find($portfolioCategoryId);
        $this->portfolioCategories  = PortfolioCategory::where('status', 1)->take(9)->latest()->get(['id', 'portfolio_category_id', 'name']);
//        $this->portfolios           = Portfolio::where('status', 1)->take(9)->latest()->get();
//        foreach ($this->portfolioCategories as $portfolioCategory) {
//            foreach ($portfolioCategory->portfolios as $portfolio ) {
//                array_push($this->portfolios, $portfolio);
//            }
//        }
//        return $portfolios;
//        return $this->portfolioCategories;
        return view('front.portfolios.index', [
            'portfolioCategories'   => $this->portfolioCategories,
//            'portfolios'            => $this->portfolios,
        ]);
    }

    public function portfolioDetails($portfolioId)
    {
        $this->portfolio = Portfolio::find($portfolioId);
        return view('front.portfolios.portfolio-details', [
            'portfolio' => $this->portfolio,
        ]);
    }
}
