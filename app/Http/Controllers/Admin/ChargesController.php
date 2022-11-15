<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\charges;
use Illuminate\Http\Request;

class ChargesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-charges-view']);
    }


    public function index()
    {
        $charges = charges::all();
        return view('admin.charges', compact('charges'));
    }

    public function create()
    {
        return view('admin.charges.create');
    }

    public function created(Request $request)
    {
        $charges = new charges();
        $charges->name = $request->input('name');
        $charges->save();
        return redirect()->route('acp.charges')->with('success', 'Created charges successfull');
    }

    public function edit($charges)
    {
        $charges = charges::find($charges);
        return view('admin.charges.edit', compact('charges'));
    }

    public function update(Request $request, $charges)
    {
        $charges = charges::find($charges);
        $charges->name = $request->input('name');
        $charges->update();
        return redirect()->route('acp.charges')->with('success', 'Update charges successfull');
    }

    public function delete($charges)
    {
        $charges = charges::find($charges);
        $charges->delete();
        return redirect()->route('acp.charges')->with('success', 'Delete charges successfull');
    }
}
