<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\security;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-security-view']);
    }


    public function index()
    {
        $security = security::all();
        return view('admin.security', compact('security'));
    }

    public function create()
    {
        return view('admin.security.create');
    }

    public function created(Request $request)
    {
        $security = new security();
        $security->name = $request->input('name');
        $security->save();
        return redirect()->route('acp.security')->with('success', 'Created security successfull');
    }

    public function edit($security)
    {
        $security = security::find($security);
        return view('admin.security.edit', compact('security'));
    }

    public function update(Request $request, $security)
    {
        $security = security::find($security);
        $security->name = $request->input('name');
        $security->update();
        return redirect()->route('acp.security')->with('success', 'Update security successfull');
    }

    public function delete($security)
    {
        $security = security::find($security);
        $security->delete();
        return redirect()->route('acp.security')->with('success', 'Delete security successfull');
    }
}
