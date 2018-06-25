<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        // Eager Loading - n+1
        $posts = Post::with('user', 'category', 'tags')->paginate(15);
        // $posts = Post::get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user', 'category', 'tags', 'comments.replies');

        return view('posts.show', compact('post'));
    }
}
