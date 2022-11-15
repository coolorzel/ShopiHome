<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class  ACPController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:ACP-view']);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function control()
    {
        $permission = ['test nie istnieje...', 'ACP-system-control', 'ACP-view', 'ACP-user-list-view', 'ACP-user-edit', 'ACP-user-update', 'ACP-user-edit-avatar', 'ACP-user-edit-password', 'ACP-user-delete', 'ACP-user-view', 'ACP-role-list-view', 'ACP-role-edit', 'ACP-role-create', 'ACP-role-update', 'ACP-role-delete', 'ACP-permission-list-view', 'ACP-permission-edit', 'ACP-permission-create', 'ACP-permission-delete', 'ACP-permission-update'];
        $roles = ['user', 'admin', 'Super Admin', 'test nie istnieje...'];
        $db_roles = Role::all()->pluck('name')->toArray();
        $db_rolesnew = Role::all();
        $db_permissionsnew = Permission::all();
        $db_permissions = Permission::all()->pluck('name')->toArray();
        $users = User::role('Super Admin')->orderBy('email')->pluck('email');
        return view('admin.control', compact('permission', 'db_permissions', 'roles', 'db_roles', 'users', 'db_rolesnew', 'db_permissionsnew'));
    }
}
