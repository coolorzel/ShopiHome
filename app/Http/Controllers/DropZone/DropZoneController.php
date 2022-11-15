<?php

namespace App\Http\Controllers\DropZone;

use App\Http\Controllers\Controller;
use App\Models\images;
use Illuminate\Http\Request;

class DropZoneController extends Controller
{
    function index()
    {
        return view('dropzone');
    }

    function upload(Request $request)
    {
        $image = $request->file('file');
        //dd($image);
        $imageName = mt_rand() . time() . '.' . $image->extension();

        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
    }

    function fetch()
    {
        $images = \File::allFiles(public_path('images'));
        $output = '<div class="row">';
        $img_id = images::where('name', $image->getFilename())->first();
        foreach($images as $image)
        {
            $output .= '<label>
  <input type="radio" name="images_file" value="'.$img_id->id.'">
                <img src="'.asset('images/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            </label>
      ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
        if($request->get('name'))
        {
            \File::delete(public_path('images/' . $request->get('name')));
        }
    }
}
