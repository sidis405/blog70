<?php

namespace App\Observers;

use App\Post;
use App\Events\PostWasUpdated;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function updated(Post $post)
    {
        event(new PostWasUpdated($post));
    }

    public function deleting(Post $post)
    {
        //rimuovi immagine
        Storage::delete(str_replace('/storage/', '', $post->cover));
        // rimuovi associazioni con tags
        $post->tags()->sync([]);
    }
}
