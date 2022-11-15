<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-role-list-view']);
    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.roles',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('acp.roles')->with('success','Role created successfully');
    }

    public function edit(Role $role)
    {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        //dd($rolePermissions);
        $permissions = Permission::get();

        return view('admin.role.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        return redirect()->route('acp.roles')->with('success','Role updated successfully');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('acp.roles')->with('success','Role deleted successfully');
    }
}
