<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'required|image|max:5120',
        ]);

        // get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        // get just the file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // get just the extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        // create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        // upload image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

        // create album
        $photo = new Photo;

        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getSize();
        $photo->photo = $filenameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);

        if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();

            return redirect('/')->with('success', 'Photo deleted');
        }
    }
}
