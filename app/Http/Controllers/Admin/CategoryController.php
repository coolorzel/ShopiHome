<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryForm;
use App\Models\FormHasCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-category-view']);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function create()
    {
        $formcategory = CategoryForm::all();
        return view('admin.category.create', compact('formcategory'));
    }

    public function created(Request $request)
    {
        $category = new Category();
        /*if ($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->photo = $filename;
        }*/

        $category->photo = $request->input('photo');
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->content = $request->input('content');
        $category->keywords = $request->input('keywords');
        $category->enable = $request->enable ? '1':'0';
        $category->save();
        self::formCategory($request->get('formcat'));
        return redirect()->route('acp.category')->with('success', 'Created category successfull');
    }

    static function formCategory($formcat)
    {
        $id = Category::orderBy('id', 'desc')->select('id')->first();
        if(!empty($formcat)) {
            foreach ($formcat as $item => $value) {
                $form = new FormHasCategory();
                $form->categoryId = $id->id;
                $form->formId = $value;
                $form->save();
            }
        }
    }

    public function edit($category)
    {
        $formcategory = CategoryForm::get();
        //$formhascategory = FormHasCategory::all()->pluck('categoryId')->toArray();
        $formhascategory = FormHasCategory::where('categoryId', $category)->pluck('formId')->toArray();
        $category = Category::find($category);
        //dd($formhascategory);
        return view('admin.category.edit', compact('category', 'formcategory', 'formhascategory'));
    }

    public function edited(Request $request, $category)
    {
        $category = Category::find($category);
        /*if($request->hasFile('photo'))
        {
            $path = 'assets/uploads/category/'.$category->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->photo = $filename;
        }*/
        $category->photo = $request->input('photo');
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->content = $request->input('content');
        $category->keywords = $request->input('keywords');
        $category->enable = $request->enable ? '1' : '0';
        //$category->update();
        self::formCategoryEdit($request->get('formcat'), $category->id);
        return redirect()->route('acp.category')->with('success', 'Update category successfull');
    }

    static function formCategoryEdit($formcat, $id)
    {
        //$id = Category::orderBy('id', 'desc')->select('id')->first();
        $del = FormHasCategory::where('categoryId', $id)->get();

            foreach($del as $item)
            {
                //dd($item->id);
                $dat = FormHasCategory::find($item->id);
                $dat->delete();
            }
        if(!empty($formcat))
        {
        foreach ($formcat as $item => $value)
            {
                $form = new FormHasCategory();
                $form->categoryId = $id;
                $form->formId = $value;
                $form->save();
            }
        }
    }
    public function delete($category)
    {
        $category = Category::find($category);
        $del = FormHasCategory::where('categoryId', $category->id)->get();

        foreach($del as $item)
        {
            //dd($item->id);
            $dat = FormHasCategory::find($item->id);
            $dat->delete();
        }
        $path = 'assets/uploads/category/'.$category->photo;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $category->delete();
        return redirect()->route('acp.category')->with('success', 'Delete category successfull');
    }
}
