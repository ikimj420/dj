<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Image extends Model
{
    use Commentable;

    public $guarded = [];

    //belongsTo
    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class, 'album_id');
    }
}
