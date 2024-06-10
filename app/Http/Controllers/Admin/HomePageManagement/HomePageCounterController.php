<?php

namespace App\Http\Controllers\Admin\HomePageManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomePageManagement\HomePageCounter;
use Illuminate\Http\Request;

class HomePageCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.home-page-management.home-page-counters.index',[
            'homePageCounters' => HomePageCounter::latest()->get(['id', 'title', 'counter_number', 'status']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home-page-management.home-page-counters.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'counter_number'    => 'required',
        ]);
        HomePageCounter::createOrUpdateHomePageCounter($request);
        return redirect()->route('admin.home-page-counters.index')->with('success', 'Created Successfully');
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
        return view('admin.home-page-management.home-page-counters.form',[
            'homePageCounter'    => HomePageCounter::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        HomePageCounter::createOrUpdateHomePageCounter($request, $id);
        return redirect()->route('admin.home-page-counters.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        HomePageCounter::deleteHomePageCounter($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
