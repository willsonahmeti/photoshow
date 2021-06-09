<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photo')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|image|max:5120',
        ]);

        // get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        // get just the file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // get just the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        // upload image
        $path = $request->file('cover_image')->storeAs('public/album_cover', $filenameToStore);

        // create album
        $album = new Album;

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album Created');
    }

    public function show($id)
    {
        return view('albums.show')->with('album', Album::with('Photo')->find($id));
    }
}
