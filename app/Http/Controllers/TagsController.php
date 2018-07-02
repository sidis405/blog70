<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {

        // filtriamo il post per criterio di relation
        // criterio di relation - tag_id (tabella pivot) == $tag->id ===>>> L'associazione esiste
        $posts = Post::with('user', 'category')->whereHas('tags', function ($query) use ($tag) {
            return $query->where('tag_id', $tag->id);
        })->latest()->paginate(15);

        return view('tags.show', compact('tag', 'posts'));
    }
}
