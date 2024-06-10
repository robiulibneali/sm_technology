<?php

namespace App\Http\Controllers\Admin\AdditionalFeaturesManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalFeaturesManagement\ClientFeedback;
use Illuminate\Http\Request;

class ClientFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.additional-features-management.client-feedbacks.index',[
            'clientFeedbacks' => ClientFeedback::latest()->get(['id', 'client_name', 'client_country', 'user_image', 'feedback', 'total_rating', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.additional-features-management.client-feedbacks.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name'       => 'required',
            'client_country'    => 'required',
            'total_rating'      => 'required',
            'user_image'        => 'image|mimes:jpg,png,jpeg',
        ]);
        ClientFeedback::createOrUpdateClientFeedback($request);
        return redirect()->route('admin.client-feedbacks.index')->with('success', 'Created Successfully');
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
        return view('admin.additional-features-management.client-feedbacks.form',[
            'clientFeedback' => ClientFeedback::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ClientFeedback::createOrUpdateClientFeedback($request, $id);
        return redirect()->route('admin.client-feedbacks.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClientFeedback::deleteClientFeedback($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
