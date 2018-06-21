<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // appartiene a 1+ Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // appartiene a 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // appartiene a 1 Catagory
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ha 1+ Comment morph
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
