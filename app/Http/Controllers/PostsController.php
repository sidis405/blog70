<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        // Eager Loading - n+1
        return Post::with('user', 'category', 'tags')->get();
    }
}
