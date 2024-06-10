<?php

namespace App\Http\Controllers\Admin\ServiceManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceManagement\OurService;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Http\Request;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service-management.our-services.index',[
            'ourServices' => OurService::latest()->get(['id', 'our_service_category_id', 'title', 'icon_class', 'image', 'thamb_image', 'short_description', 'long_description', 'view_count', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service-management.our-services.form',[
            'ourServiceCategories' => OurServiceCategory::where('status', 1)->get(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OurService::createOrUpdateOurService($request);
        return redirect()->route('admin.our-services.index')->with('success', 'Created Successfully');
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
        return view('admin.service-management.our-services.form',[
            'ourService'              => OurService::find($id),
            'ourServiceCategories'    => OurServiceCategory::whereStatus(1)->get(['id', 'name']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        OurService::createOrUpdateOurService($request, $id);
        return redirect()->route('admin.our-services.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OurService::deleteOurService($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
