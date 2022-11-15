<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\typeoffer;
use Illuminate\Http\Request;

class TypeOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-typeoffer-view']);
    }


    public function index()
    {
        $typeoffer = typeoffer::all();
        return view('admin.typeoffer', compact('typeoffer'));
    }

    public function create()
    {
        return view('admin.typeoffer.create');
    }

    public function created(Request $request)
    {
        $typeoffer = new typeoffer();
        $typeoffer->name = $request->input('name');
        $typeoffer->save();
        return redirect()->route('acp.typeoffer')->with('success', 'Created payment successfull');
    }

    public function edit($typeoffer)
    {
        $typeoffer = typeoffer::find($typeoffer);
        return view('admin.typeoffer.edit', compact('typeoffer'));
    }

    public function update(Request $request, $typeoffer)
    {
        $typeoffer = typeoffer::find($typeoffer);
        $typeoffer->name = $request->input('name');
        $typeoffer->update();
        return redirect()->route('acp.typeoffer')->with('success', 'Update typeoffer successfull');
    }

    public function delete($typeoffer)
    {
        $typeoffer = typeoffer::find($typeoffer);
        $typeoffer->delete();
        return redirect()->route('acp.typeoffer')->with('success', 'Delete typeoffer successfull');
    }
}
