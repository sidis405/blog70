<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        // $tags = \App\Tag::all();

        // return $tags->pluck('id')->random(3);

        // Eager Loading - n+1
        return Post::with('user', 'category', 'tags')->get();
    }
}
