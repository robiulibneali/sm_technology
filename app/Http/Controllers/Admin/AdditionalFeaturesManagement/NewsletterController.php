<?php

namespace App\Http\Controllers\Admin\AdditionalFeaturesManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalFeaturesManagement\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.additional-features-management.newsletters.index',[
            'newsletters' => Newsletter::latest()->get(['id', 'name', 'email', 'mobile', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return view('admin.additional-features-management.newsletters.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'   => 'required',
        ]);
        Newsletter::createOrUpdateNewsletter($request);
        return back()->with('success', 'Created Successfully');
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
//        return view('admin.additional-features-management.newsletters.form',[
//            'newsletter' => Newsletter::find($id),
//        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        Newsletter::createOrUpdateNewsletter($request, $id);
//        return redirect()->route('admin.newsletters.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Newsletter::deleteNewsletter($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
