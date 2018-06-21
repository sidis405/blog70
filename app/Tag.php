<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // appartengono a 1+ Post
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
