<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public $guarded = [];

    //belongsTo
    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class, 'album_id');
    }
}
