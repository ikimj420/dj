<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function store(Request $request, Video $video)
    {
        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        $video = Video::create($this->validateRequest());
        //add auth user
        $this->User($video);
        //explode tags by ,
        $tags = explode(',', $request->video_tag);
        //add tags
        $video->tag($tags);
        //save video db
        $video->save();

        return back()->with('success','Video Created Successfully!');

    }

    public function show($id)
    {        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/')->with('error', 'No No No');
        }
        $video = Video::findOrFail($id);
        return view('video.show', compact('video'));
    }

    public function update(Request $request, $id)
    {
        //check for admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        $video = Video::findOrFail($id);
        //save auth user
        $this->User($video);
        //explode tags by ,
        $tags = explode(',', $request->video_tag);
        //retag
        $video->retag($tags);
        //update blog
        $video->update($this->validateRequest());

        return redirect(route('users.index'))->with('success','Video Updated Successfully!');
    }

    public function destroy($id)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        $video = Video::findOrFail($id);
        //delete blog
        $video->delete();

        return redirect(route('users.index'))->with('success','Video Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:4',
            'video' => 'required',
            'date' => 'required',

            'desc' => 'sometimes',
            'dj' => 'sometimes',
        ]);
    }

    //func get auth user to save user_id
    private function User(Video $video)
    {
        $video->update([ 'user_id' => Auth::user()->id]);
    }
}
