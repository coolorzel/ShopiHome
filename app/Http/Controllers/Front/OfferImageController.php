<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\images;
use App\Models\Offer;
use App\Models\payment;
use App\Models\TemporaryFile;
use App\Models\typeoffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OfferImageController extends Controller
{
    public function upload(Request $request, $cat_id, $lsd)
    {
        $image = $request->file('file');
        //dd($image);
        $imageName = mt_rand() . time() . '.' . $image->extension();

        $folder = $lsd. '/' .$cat_id;

        $image->move(public_path('images/' .$lsd. '/' .$cat_id), $imageName);

        images::create([
            'name' => $imageName,
            'alt' => $request->file('file')->getClientOriginalName(),
            'offer_id' => $lsd,
        ]);

        return response()->json(['success' => $imageName, 'message' => $cat_id.' --- '. $lsd]);
/*        //$this->test();
        if ($request->hasFile('images_file')) {
            if($offer = Offer::where([
                ['user_id', Auth::id()],
                ['isCreated', true],
                ['category_id', $cat_id],
            ])->first())
            {
                $file = $request->file('images_file');
                $filename = $file->getClientOriginalName();
                $image_name = md5(rand(1000, 10000));
                $fullfilename = $image_name.'.jpg';//.'.'.$filename;
                $folder = $offer->id;
                $file->storeAs('public/assets/uploads/offer/'.$folder, $fullfilename);

                images::create([
                    'name' => $fullfilename,
                    'alt' => $filename,
                    'offer_id' => $folder
                ]);
                $return = $fullfilename;
                return $return;
            }
            if($offer = Offer::where([
                ['user_id', Auth::id()],
                ['isCreated', false],
                ['category_id', $cat_id],
                ['id', $lsd],
            ])->first())
            {
                $file = $request->file('images_file');
                $filename = $file->getClientOriginalName();
                $image_name = md5(rand(1000, 10000));
                $fullfilename = $image_name.'.jpg';//.'.'.$filename;
                $folder = $offer->id;
                $file->storeAs('public/assets/uploads/offer/'.$folder, $fullfilename);

                images::create([
                    'name' => $fullfilename,
                    'alt' => $filename,
                    'offer_id' => $folder
                ]);
                $return = $fullfilename;
                return $return;
            }
        }
        return '';
*/
    }

    function fetch($cat_id, $lsd)
    {
        if(\File::exists(public_path('images/' .$cat_id. '/' .$lsd)))
        {
            $offer = Offer::where('id', $lsd)->first();
            $images = \File::allFiles(public_path('images/' .$cat_id. '/' .$lsd));
            $output = '<div class="row">';
            foreach($images as $image)
            {
                $checked = '';
                $img_id = images::where('name', $image->getFilename())->first();
                if($offer->images_id == $img_id->id)
                {
                    $checked = 'checked';
                }
                //dd($image->getFilename());
                $output .= '<label class="col-md-3">
  <input type="radio" name="images_file" value="'.$img_id->id.'"'. $checked. '>
                <img src="'.asset('images/' .$lsd. '/' .$cat_id. '/' . $image->getFilename()).'" class="img-thumbnail"  />
                <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'"><i class="fa fa-trash" style="background: red;" aria-hidden="true"></i></button>
            </label>
      ';
            }
            $output .= '</div>';
        }
        else
        {
            $output = "Empty";
        }

        echo $output;
    }

    public function delete(Request $request, $cat_id, $lsd)
    {
        if($request->input('name'))
        {
            \File::delete(public_path('images/' .$cat_id. '/' .$lsd . '/' . $request->input('name')));
            images::where('name', $request->input('name'))->delete();
        }
        /*
        $file = request()->getContent();
        $offer = Offer::where([
            ['user_id', Auth::id()],
            ['isCreated', true],
        ])->first();
        $image = images::where([
            //['offer_id', $offer->id],
            ['name', $file],
        ])->first();
        $image->delete();
        $folder = $offer->id;
        unlink(storage_path('app/public/assets/uploads/offer/'.$folder.'/'.$file));

        return $file;
        //return request()->getContent();
    */
    }

  /*  public function test()
    {
        $offer = Offer::where([
            ['user_id', Auth::id()],
            ['isCreated', true],
        ])->first();

        $images = images::where('offer_id', $offer->id)->get();
        $directory = 'public/assets/uploads/offer/'.$offer->id;
        $storage = Storage::disk('local')->allFiles($directory);
//        dd($images);
        $data = array(
            'title' => 'All files',
            'files' => $storage
        );
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $table[0] = 0;
        $table2[0] = 0;

        foreach($images as $item)
        {
            $table2[$count3+1] = $item->name;
            $count3 += 1;
        }
        //dd($table2);
        foreach($storage as $item)
        {
            $filename = str_replace($directory.'/', '', $item);
            $table[$count3+1] = $filename;
            $count3 += 1;
            if(in_array($filename, $table2))
            {
                $count1 += 1;
            }
            else
            {
                unlink(storage_path('app/'.$directory.'/'.$filename));
                $count2 += 1;
            }
        }
        return $count1;
    }*/
}
