<?php

namespace App\Http\Controllers\Admin\PortfolioManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $portfolioCategories = [];

    public function index(Request $request)
    {
        if (isset($request->portfolio_category_id))
        {
            $this->portfolioCategories = PortfolioCategory::where('portfolio_category_id', $request->portfolio_category_id)->latest()->latest()->get(['id', 'portfolio_category_id', 'name', 'image', 'description', 'status']);
        } else {
            $this->portfolioCategories = PortfolioCategory::where('portfolio_category_id', 0)->latest()->get(['id', 'portfolio_category_id', 'name', 'image', 'description', 'status']);
        }
//        if (isset($request->portfolio_category_id))
//        {
//            $this->portfolioCategories = PortfolioCategory::where('portfolio_category_id', $request->portfolio_category_id)->latest()->latest()->get();
//        } else {
//            $this->portfolioCategories = PortfolioCategory::where('portfolio_category_id', 0)->latest()->get();
//        }
        return view('admin.portfolio-management.portfolio-categories.index',[
            'portfolioCategories' => $this->portfolioCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-management.portfolio-categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
        ]);
//        return $request;
        PortfolioCategory::createOrUpdatePortfolioCategory($request);
        return redirect()->route('admin.portfolio-categories.index', ['portfolio_category_id' => $request->portfolio_category_id ?? 0])->with('success', 'Created Successfully');
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
        return view('admin.portfolio-management.portfolio-categories.form',[
            'portfolioCategory' => PortfolioCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        PortfolioCategory::createOrUpdatePortfolioCategory($request, $id);
        return redirect()->route('admin.portfolio-categories.index', ['portfolio_category_id' => $request->portfolio_category_id ?? 0])->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PortfolioCategory::deletePortfolioCategory($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
