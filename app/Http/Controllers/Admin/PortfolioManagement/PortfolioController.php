<?php

namespace App\Http\Controllers\Admin\PortfolioManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioManagement\Portfolio;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $portfolios = [], $portfolio;

    public function index(Request $request)
    {
        $this->portfolios = Portfolio::latest()->get(['id','title', 'image', 'short_description', 'long_description', 'author_name', 'fb_link', 'twitter_link', 'instagram_link', 'linkedin_link', 'status']);

        return view('admin.portfolio-management.portfolios.index',[
            'portfolios' => $this->portfolios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-management.portfolios.form', [
            'portfolioCategories'   => PortfolioCategory::where('status', 1)->get(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
        ]);
//        return $request;
        $this->portfolio  = Portfolio::createOrUpdatePortfolio($request);
        /*if (!$portfolio) {
            return redirect()->route('admin.portfolios.index')->with('error', 'Failed to create portfolio');
        }*/
        $this->portfolio->portfolioCategories()->attach($request->portfolio_categories);
        return redirect()->route('admin.portfolios.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.portfolio-management.portfolios.form',[
            'portfolio'             => Portfolio::find($id),
            'portfolioCategories'   => PortfolioCategory::where('status', 1)->get(/*['id', 'name']*/),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->portfolio  = Portfolio::createOrUpdatePortfolio($request, $id);
        if (!empty($request->portfolio_categories))
        {
            $this->portfolio->portfolioCategories()->detach();
            $this->portfolio->portfolioCategories()->attach($request->portfolio_categories);

        }
        return redirect()->route('admin.portfolios.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Portfolio::deletePortfolio($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
