<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    function index() {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    function create() {
        return view('admin.media.create');
    }

    function store(Request $request) {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['path'=>$name]);
    }

    function destroy($id) {
        $photo = Photo::findOrFail($id);
        unlink(public_path() . '/' . $photo->path);
        $photo->delete();
        return back();
    }

    function deleteMedia(Request $request) {
     
        if(empty($request->checkBoxArray)) {
            return back();
        }

        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach($photos as $photo) {
            $photo->delete();
        }

        return back();
    }
}
