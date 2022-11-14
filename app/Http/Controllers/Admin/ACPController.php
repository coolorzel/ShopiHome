<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ACPController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role_or_permission:admin']);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users', ));
    }

    public function roles()
    {

    }
}
