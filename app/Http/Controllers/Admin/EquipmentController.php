<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-equipment-view']);
    }


    public function index()
    {
        $equipment = equipment::all();
        return view('admin.equipment', compact('equipment'));
    }

    public function create()
    {
        return view('admin.equipment.create');
    }

    public function created(Request $request)
    {
        $equipment = new equipment();
        $equipment->name = $request->input('name');
        $equipment->save();
        return redirect()->route('acp.equipment')->with('success', 'Created equipment successfull');
    }

    public function edit($equipment)
    {
        $equipment = equipment::find($equipment);
        return view('admin.equipment.edit', compact('equipment'));
    }

    public function update(Request $request, $equipment)
    {
        $equipment = equipment::find($equipment);
        $equipment->name = $request->input('name');
        $equipment->update();
        return redirect()->route('acp.equipment')->with('success', 'Update equipment successfull');
    }

    public function delete($equipment)
    {
        $equipment = equipment::find($equipment);
        $equipment->delete();
        return redirect()->route('acp.equipment')->with('success', 'Delete equipment successfull');
    }
}
