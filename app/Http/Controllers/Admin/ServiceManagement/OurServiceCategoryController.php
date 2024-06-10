<?php

namespace App\Http\Controllers\Admin\ServiceManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Http\Request;

class OurServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service-management.our-service-categories.index',[
            'ourServiceCategories' => OurServiceCategory::latest()->get(['id', 'name', 'icon_class', 'description', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service-management.our-service-categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
        ]);
        OurServiceCategory::createOrUpdateOurServiceCategory($request);
        return redirect()->route('admin.our-service-categories.index')->with('success', 'Created Successfully');
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
        return view('admin.service-management.our-service-categories.form',[
            'ourServiceCategory' => OurServiceCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        OurServiceCategory::createOrUpdateOurServiceCategory($request, $id);
        return redirect()->route('admin.our-service-categories.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OurServiceCategory::deleteOurServiceCategory($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
