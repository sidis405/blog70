<?php

namespace SHARED_STUFF\Repositories;

use App\Post;
use App\Http\Requests\PostRequest;

class PostsRepository
{
    public function getAll()
    {
        $posts = Post::with('user', 'category', 'tags')->latest();

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        return $posts;
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

        return $post;
    }
}
