<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request, User $user, Image $image)
    {
        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //validate data and create without pics
        $image = Image::create($this->validateRequest());
        //add pics
        $pics = 'pics';
        $img_request = $request->hasFile($pics);
        $img = $request->file($pics);
        $folder = 'image';
        $filenameToStore = $this->createImage($img_request, $img, $folder, $pics);
        $image->$pics = $filenameToStore;
        //save in db
        $image->save();
        return back()->with('success','Image Created Successfully!');
    }

    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //save picture
        $folder = 'image';
        $pics = 'pics';
        $img_request = $request->hasFile($pics);
        //check for picture
        if(Request()->hasFile($pics)){
            $img = Request()->file($pics);
            if($image->$pics != 'default.svg'){
                // Delete Images
                Storage::delete('public/'. $folder .'/'.$image->$pics);
                Storage::delete('public/'. $folder .'/thumbnail/'.$image->$pics);
                Storage::delete('public/'. $folder .'/large/'.$image->$pics);
            }
            $filenameToStore = $this->updateImage($img_request, $img, $folder, $pics);
            $image->$pics = $filenameToStore;
        }
        //update
        $image->update($this->validateRequest());

        return back()->with('success','Image Updated Successfully!');
    }

    public function destroy(Image $image)
    {
        //check is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //delete
        $image->delete();
        //delete picture
        if($image->pics != 'default.svg'){
            // Delete Images
            Storage::delete('public/image/'.$image->pics);
            Storage::delete('public/image/thumbnail/'.$image->pics);
            Storage::delete('public/image/large/'.$image->pics);
        }
        return redirect(route('users.index'))->with('success','Image Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:4',

            'date' => 'sometimes',
            'album_id' => 'sometimes',
            'desc' => 'sometimes',
        ]);
    }
}
