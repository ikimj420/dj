<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function store(Request $request, User $user, Album $album)
    {
        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //explode tags by ,
        $tags = explode(',', $request->album_tag);
        //validate data and create without pics
        $album = Album::create($this->validateRequest());
        //add pics
        $pics = 'pics';
        $img_request = $request->hasFile($pics);
        $img = $request->file($pics);
        $folder = 'album';
        $filenameToStore = $this->createImage($img_request, $img, $folder, $pics);
        $album->$pics = $filenameToStore;
        //add tags
        $album->tag($tags);
        //save in db
        $album->save();
        return back()->with('success','Album Created Successfully!');
    }

    public function show(Album $album)
    {
        $images= $album->images()->get();
        return view('album.show', compact('album', 'images'));
    }

    public function update(Request $request, Album $album)
    {
        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //explode tags by ,
        $tags = explode(',', $request->album_tag);
        //save picture
        $folder = 'album';
        $pics = 'pics';
        $img_request = $request->hasFile($pics);
        //check for picture
        if(Request()->hasFile($pics)){
            $img = Request()->file($pics);
            if($album->$pics != 'default.svg'){
                // Delete Images
                Storage::delete('public/'. $folder .'/'.$album->$pics);
                Storage::delete('public/'. $folder .'/thumbnail/'.$album->$pics);
                Storage::delete('public/'. $folder .'/large/'.$album->$pics);
            }
            $filenameToStore = $this->updateImage($img_request, $img, $folder, $pics);
            $album->$pics = $filenameToStore;
        }
        //update
        $album->update($this->validateRequest());
        //retag
        $album->retag($tags);
        return back()->with('success','Album Updated Successfully!');
    }

    public function destroy(Album $album)
    {
        //check is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //del images from album app
        $images = Image::where('album_id', '=', $album->id)->get();
        foreach($images as $image){
            Storage::delete('public/image/'.$image->pics);
            Storage::delete('public/image/thumbnail/'.$image->pics);
            Storage::delete('public/image/large/'.$image->pics);
        }
        //delete from db
        $album->delete();
        $album->images()->delete();
        //delete picture app
        if($album->pics != 'default.svg'){
            // Delete Images
            Storage::delete('public/album/'.$album->pics);
            Storage::delete('public/album/thumbnail/'.$album->pics);
            Storage::delete('public/album/large/'.$album->pics);
        }
        return redirect(route('users.index'))->with('success','Album Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:4',
            'date' => 'required',
            'desc' => 'required',
        ]);
    }
}
