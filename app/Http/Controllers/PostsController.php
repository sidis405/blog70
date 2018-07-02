<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show'); //eccetto index, show
    }

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags');

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        $posts = $posts->latest()->paginate(15);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user', 'category', 'tags', 'comments.replies');

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $post = new Post; // null object pattern

        return view('posts.create', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post)->with('type', 'success')->with('status', 'Post was created');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post)->with('type', 'warning')->with('status', 'Post was updated');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/')->with('type', 'danger')->with('status', 'Post was deleted');
    }
}
