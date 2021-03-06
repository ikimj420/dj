<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentTaggable\Taggable;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use Notifiable;
    use Taggable;
    use Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //BelongsTo
    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class);
    }

    //BelongsTo
    public function videos()
    {
        return $this->hasMany(\App\Models\Video::class);
    }
}
