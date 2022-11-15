<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryForm;
use Illuminate\Http\Request;

class FormCategory extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-formcategory-view']);
    }


    public function index()
    {
        $formcategory = CategoryForm::all();
        return view('admin.formcategory', compact('formcategory'));
    }

    public function create()
    {
        return view('admin.formcategory.create');
    }

    public function created(Request $request)
    {
        $formcategory = new CategoryForm();
        $formcategory->name = $request->input('name');
        $formcategory->type = $request->input('type');
        $formcategory->save();
        return redirect()->route('acp.formcategory')->with('success', 'Created formcategory successfull');
    }

    public function edit($formcategory)
    {
        $formcategory = CategoryForm::find($formcategory);
        return view('admin.formcategory.edit', compact('formcategory'));
    }

    public function update(Request $request, $formcategory)
    {
        $formcategory = CategoryForm::find($formcategory);
        $formcategory->name = $request->input('name');
        $formcategory->type = $request->input('type');
        $formcategory->update();
        return redirect()->route('acp.formcategory')->with('success', 'Update formcategory successfull');
    }

    public function delete($formcategory)
    {
        $formcategory = CategoryForm::find($formcategory);
        $formcategory->delete();
        return redirect()->route('acp.formcategory')->with('success', 'Delete formcategory successfull');
    }
}
