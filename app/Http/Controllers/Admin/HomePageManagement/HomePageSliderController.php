<?php

namespace App\Http\Controllers\Admin\HomePageManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomePageManagement\HomePageSlider;
use Illuminate\Http\Request;

class HomePageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home-page-management.home-page-sliders.index',[
            'homePageSliders' => HomePageSlider::latest()->get(['id', 'title', 'note', 'slider_image', 'service_link', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-page-management.home-page-sliders.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'slider_image'      => 'image|mimes:jpg,png,jpeg',
        ]);
        HomePageSlider::createOrUpdateHomePageSlider($request);
        return redirect()->route('admin.home-page-sliders.index')->with('success', 'Created Successfully');
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
        return view('admin.home-page-management.home-page-sliders.form',[
            'homePageSlider'    => HomePageSlider::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        HomePageSlider::createOrUpdateHomePageSlider($request, $id);
        return redirect()->route('admin.home-page-sliders.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        HomePageSlider::deleteHomePageSlider($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
