<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-media-view']);
    }


    public function index()
    {
        $media = media::all();
        return view('admin.media', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function created(Request $request)
    {
        $media = new media();
        $media->name = $request->input('name');
        $media->save();
        return redirect()->route('acp.media')->with('success', 'Created media successfull');
    }

    public function edit($media)
    {
        $media = media::find($media);
        return view('admin.media.edit', compact('media'));
    }

    public function update(Request $request, $media)
    {
        $media = media::find($media);
        $media->name = $request->input('name');
        $media->update();
        return redirect()->route('acp.media')->with('success', 'Update media successfull');
    }

    public function delete($media)
    {
        $media = media::find($media);
        $media->delete();
        return redirect()->route('acp.media')->with('success', 'Delete media successfull');
    }
}
