<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $tag->load('posts');

        return $tag;
    }
}
