<?php

namespace App\Http\Controllers\Admin\HomePageManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomePageManagement\HomePageQualityServiceRating;
use Illuminate\Http\Request;

class HomePageQualityServiceRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home-page-management.home-page-quality-service-ratings.index',[
            'homePageQualityServiceRatings' => HomePageQualityServiceRating::latest()->get(['id', 'title', 'rating', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-page-management.home-page-quality-service-ratings.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'rating'    => 'required',
        ]);
        HomePageQualityServiceRating::createOrUpdateHomePageQualityServiceRating($request);
        return redirect()->route('admin.home-page-quality-service-ratings.index')->with('success', 'Created Successfully');
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
        return view('admin.home-page-management.home-page-quality-service-ratings.form',[
            'homePageQualityServiceRating'    => HomePageQualityServiceRating::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        HomePageQualityServiceRating::createOrUpdateHomePageQualityServiceRating($request, $id);
        return redirect()->route('admin.home-page-quality-service-ratings.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        HomePageQualityServiceRating::deleteHomePageQualityServiceRating($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
