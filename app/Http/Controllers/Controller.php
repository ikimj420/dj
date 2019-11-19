<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // function for create image
    public function createImage($img_request, $img, $folder, $pics){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $img->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $img->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $filenameToStore = str_replace(' ','_', $filenameToStor);
            //save in folder
            /*request()->$pics->move(public_path('/storage/' . $folder), $filenameToStore);*/
            // resize image and save in folder
            $images = $img;
            Image::make($images)->fit(500, 500)->save( public_path('/storage/' . $folder . '/' . $filenameToStore ) );
            //create thumbnail save in app
            Image::make($images)->fit(100, 100)->save( public_path('/storage/' . $folder . '/thumbnail/' . $filenameToStore ) );
            //create Large
            Image::make($images)->fit(1280, 720)->save( public_path('/storage/' . $folder . '/large/' . $filenameToStore ) );
        }else{
            $filenameToStore = 'default.svg';
        }
        return $filenameToStore;
    }

    // function for update images
    public function updateImage($img_request, $img, $folder, $pics){
        if($img_request){
            // Filename with extension
            $filenameWithExt = $img->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $img->getClientOriginalExtension();
            // Filename to store
            $filenameToStor = $filename.'_'.time().'.'.$extension;
            //remove space if exist
            $filenameToStore = str_replace(' ','_', $filenameToStor);
            //save in folder
            /*request()->$pics->move(public_path('/storage/' . $folder), $filenameToStore);*/
            // resize image and save in folder
            $images = $img;
            Image::make($images)->fit(500, 500)->save( public_path('/storage/' . $folder . '/' . $filenameToStore ) );
            //update thumbnail save in app
            Image::make($images)->fit(100, 100)->save( public_path('/storage/' . $folder . '/thumbnail/' . $filenameToStore ) );
            //create Large
            Image::make($images)->fit(1280, 720)->save( public_path('/storage/' . $folder . '/large/' . $filenameToStore ) );
        }
        return $filenameToStore;
    }
}
