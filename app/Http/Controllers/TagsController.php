<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Blog;

class TagsController extends Controller
{
    public function index($tag)
    {
        //get all tag for blog
        $blogs = Blog::withAllTags([$tag])->get();
        //get all tag for blog
        $videos = Video::withAllTags([$tag])->get();

        return view('tags.index', compact('blogs', 'videos'));
    }
}
