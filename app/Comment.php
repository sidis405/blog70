<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // appartiene a 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relazione morph
    public function commentable()
    {
        return $this->morphTo();
    }

    // Puo avere replies
    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
