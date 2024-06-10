<?php

namespace App\Http\Controllers\Admin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleManagement\Permission;
use App\Models\Admin\RoleManagement\PermissionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    private $permissionRoles, $permission, $permissions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.permissions.index',[
            'permissions' => Permission::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.permissions.form', [
            'permissionCategories'    => PermissionCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
        ]);
//        abort_if(Gate::denies('permission_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Permission::createOrUpdatePermission($request);
        return redirect()->route('admin.permissions.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
//        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.permissions.form',[
            'permission'                => Permission::find($id),
            'permissionCategories'      => PermissionCategory::where('status', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        abort_if(Gate::denies('permission_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($this->permission->is_default == 1)
        {
            return back()->with('error', 'You can\'t delete a default permission.');
        }
        Permission::createOrUpdatePermission($request, $id);
        return redirect()->route('admin.permissions.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($this->permission->is_default == 1)
        {
            return back()->with('error', 'Default Role can not be deleted. Please contact your developer for help.');

        }
        Permission::deletePermission($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
