<?php

namespace App\Http\Controllers\Admin\AdditionalFeaturesManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdditionalFeaturesManagement\ExpertTeamMember;
use Illuminate\Http\Request;

class ExpertTeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.additional-features-management.expert-team-members.index',[
            'expertTeamMembers' => ExpertTeamMember::latest()->get(['id', 'name', 'position', 'image', 'description', 'fb_link', 'x_link', 'twitter_link', 'linkedin_link', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.additional-features-management.expert-team-members.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'position'   => 'required',
            'image'     => 'image|mimes:jpg,png,jpeg',
        ]);
        ExpertTeamMember::createOrUpdateExpertTeamMember($request);
        return redirect()->route('admin.expert-team-members.index')->with('success', 'Created Successfully');
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
        return view('admin.additional-features-management.expert-team-members.form',[
            'expertTeamMember' => ExpertTeamMember::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ExpertTeamMember::createOrUpdateExpertTeamMember($request, $id);
        return redirect()->route('admin.expert-team-members.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ExpertTeamMember::deleteExpertTeamMember($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
