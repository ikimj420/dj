<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class TagsController extends Controller
{
    public function index($tag)
    {
        //get all tag for blog
        $blogs = Blog::withAllTags([$tag])->get();

        return view('tags.index', compact('blogs'));
    }
}
