<?php

namespace App\Http\Controllers\Admin\AdditionalFeaturesManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdditionalFeaturesManagement\OurCustomer;

class OurCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.additional-features-management.our-customers.index',[
            'ourCustomers' => OurCustomer::latest()->get(['id', 'company_name', 'person_name', 'company_logo', 'description', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.additional-features-management.our-customers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'  => 'required',
            'person_name'   => 'required',
            'company_logo'  => 'image|mimes:jpg,png,jpeg',
        ]);
        OurCustomer::createOrUpdateOurCustomer($request);
        return redirect()->route('admin.our-customers.index')->with('success', 'Created Successfully');
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
        return view('admin.additional-features-management.our-customers.form',[
            'ourCustomer' => OurCustomer::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        OurCustomer::createOrUpdateOurCustomer($request, $id);
        return redirect()->route('admin.our-customers.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OurCustomer::deleteOurCustomer($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
