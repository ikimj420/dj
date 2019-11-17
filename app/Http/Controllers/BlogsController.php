<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('blogs.index', compact('blogs'));
    }

    public function store(Request $request, User $user, Blog $blog)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //explode tags by ,
        $tags = explode(',', $request->tags);
        //validate data and create without user and pics
        $blog = Blog::create($this->validateRequest());
        //add auth user
        $this->User($blog);
        //add pics
        $img_request = $request->hasFile('pics');
        $img = $request->file('pics');
        $folder = 'blog';
        $filenameToStore = $this->createImage($img_request, $img, $folder);
        $blog->pics = $filenameToStore;
        //add tags
        $blog->tag($tags);
        //save blog
        $blog->save();
        return back()->with('success','Blog Created Successfully!');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //explode tags by ,
        $tags = explode(',', $request->tags);
        //save auth user
        $this->User($blog);
        //save picture
        $folder = 'blog';
        $img_request = $request->hasFile('pics');
        //check for picture
        if(Request()->hasFile('pics')){
            $img = Request()->file('pics');
            if($blog->pics != 'default.svg'){
                // Delete Image
                Storage::delete('public/'. $folder .'/'.$blog->pics);
            }
            $filenameToStore = $this->updateImage($img_request, $img, $folder);
            $blog->pics = $filenameToStore;
        }
        //update blog
        $blog->update($this->validateRequest());
        //retag
        $blog->retag($tags);
        return redirect(route('blog.index'))->with('success','Blog Updated Successfully!');
    }

    public function destroy(Blog $blog)
    {
        //check for blog user and if is admin
        if(Auth::user()->isAdmin !== 1){
            return redirect('/');
        }
        //delete blog
        $blog->delete();
        //delete picture
        if($blog->pics != 'default.svg'){
            // Delete Image
            Storage::delete('public/blog/'.$blog->pics);
        }
        return redirect(route('blog.index'))->with('success','Blog Deleted Successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:4',
            'body' => 'required',

            'video' => 'sometimes',
            'dj' => 'sometimes',
        ]);
    }

    //func get auth user to save user_id
    private function User(Blog $blog)
    {
        $blog->update([ 'user_id' => Auth::user()->id]);
    }
}
