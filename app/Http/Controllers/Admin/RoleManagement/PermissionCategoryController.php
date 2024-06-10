<?php

namespace App\Http\Controllers\Admin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleManagement\PermissionCategory;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionCategoryController extends Controller
{
    protected $permissionCategory;

    public function index()
    {
//        abort_if(Gate::denies('permission_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.permission-categories.index',[
            'permissionCategories' => PermissionCategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        abort_if(Gate::denies('permission_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.permission-categories.form', [
            'permissionCategories'  => PermissionCategory::whereStatus(1)->with('permissions')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
        ]);
//        abort_if(Gate::denies('permission_category_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        PermissionCategory::createOrUpdatePermissionCategory($request);
        return redirect()->route('admin.permission-categories.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        abort_if(Gate::denies('permission_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
    //     * @param int $id
    //     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
//        abort_if(Gate::denies('permission_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.permission-categories.form',[
            'permissionCategory' => PermissionCategory::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        abort_if(Gate::denies('permission_category_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        PermissionCategory::createOrUpdatePermissionCategory($request, $id);
        return redirect()->route('admin.permission-categories.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        abort_if(Gate::denies('permission_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($this->permissionCategory->is_default == 0)
        {
            PermissionCategory::deletePermissionCategory($id);
            return back()->with('success', 'Deleted Successfully');
        } else {
            return back()->with('error', 'You can\'t delete a default Permission Category. Please contact your developer for help.');
        }
    }
}
