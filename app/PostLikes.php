<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    protected $guarded = [];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
