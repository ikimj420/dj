<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Laravelista\Comments\Commentable;

class Album extends Model
{
    use Commentable;
    use Taggable;

    public $guarded = [];

    //hasMany
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }
}
