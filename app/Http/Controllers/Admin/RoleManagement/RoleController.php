<?php

namespace App\Http\Controllers\Admin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use App\Models\Admin\RoleManagement\PermissionCategory;
use App\Models\Admin\RoleManagement\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.roles.index',[
            'roles' => Role::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.roles.form', [
            'permissionCategories'  => PermissionCategory::whereStatus(1)->with('permissions')->get(),
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
//        abort_if(Gate::denies('role_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Role::createOrUpdateRole($request);
        return redirect()->route('admin.roles.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
//        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.role-management.roles.form',[
            'role' => Role::findOrFail($id),
            'permissionCategories'  => PermissionCategory::where('status', 1)->with('permissions')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        abort_if(Gate::denies('role_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Role::createOrUpdateRole($request, $id);
        return redirect()->route('admin.roles.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Role::deleteRole($id);
        return back()->with('success', 'Deleted Successfully');
    }
}
