<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Album extends Model
{
    use Taggable;

    public $guarded = [];

    //hasMany
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }
}
