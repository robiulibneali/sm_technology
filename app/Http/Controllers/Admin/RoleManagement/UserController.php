<?php

namespace App\Http\Controllers\Admin\RoleManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleManagement\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user, $users = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role-management.users.index', [
            'users' => User::latest()->select('id', 'name', 'mobile')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role-management.users.form', [
            'roles' => Role::whereStatus(1)->get(['id', 'title']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->user = User::createOrUpdateUser($request);
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
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
        return view('admin.role-management.users.form',[
            'roles'   => Role::whereStatus(1)->get(['id', 'title']),
            'user'    => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->user = User::createOrUpdateUser($request, $id);
        return redirect()->route('admin.users.index')->with('success', 'User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::deleteUser($id);
        return back()->with('success', 'Deleted Successfully');
//        if ($id != 1)
//        {
//            User::find($id)->delete();
//            return back()->with('success', 'User deleted successfully.');
//            User::deleteUser($id);
//            return back()->with('success', 'Deleted Successfully');
//        } else {
//            return back()->with('error', 'Please Contact your developer for deleting default user');
//        }
    }
}
