<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\heating;
use Illuminate\Http\Request;

class HeatingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-heating-view']);
    }


    public function index()
    {
        $heating = heating::all();
        return view('admin.heating', compact('heating'));
    }

    public function create()
    {
        return view('admin.heating.create');
    }

    public function created(Request $request)
    {
        $heating = new heating();
        $heating->name = $request->input('name');
        $heating->save();
        return redirect()->route('acp.heating')->with('success', 'Created heating successfull');
    }

    public function edit($heating)
    {
        $heating = heating::find($heating);
        return view('admin.heating.edit', compact('heating'));
    }

    public function update(Request $request, $heating)
    {
        $heating = heating::find($heating);
        $heating->name = $request->input('name');
        $heating->update();
        return redirect()->route('acp.heating')->with('success', 'Update heating successfull');
    }

    public function delete($heating)
    {
        $heating = heating::find($heating);
        $heating->delete();
        return redirect()->route('acp.heating')->with('success', 'Delete heating successfull');
    }
}
