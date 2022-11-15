<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-parking-view']);
    }


    public function index()
    {
        $parking = parking::all();
        return view('admin.parking', compact('parking'));
    }

    public function create()
    {
        return view('admin.parking.create');
    }

    public function created(Request $request)
    {
        $parking = new parking();
        $parking->name = $request->input('name');
        $parking->save();
        return redirect()->route('acp.parking')->with('success', 'Created parking successfull');
    }

    public function edit($parking)
    {
        $parking = parking::find($parking);
        return view('admin.parking.edit', compact('parking'));
    }

    public function update(Request $request, $parking)
    {
        $parking = parking::find($parking);
        $parking->name = $request->input('name');
        $parking->update();
        return redirect()->route('acp.parking')->with('success', 'Update parking successfull');
    }

    public function delete($parking)
    {
        $parking = parking::find($parking);
        $parking->delete();
        return redirect()->route('acp.parking')->with('success', 'Delete parking successfull');
    }
}
