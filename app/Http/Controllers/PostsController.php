<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'destroy');
        $this->middleware('auth')->except('index', 'show'); //eccetto index, show
    }

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

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        // return $request->all('title', 'preview', 'body', 'category_id');
        // return $request->only('title', 'preview', 'body', 'category_id');

        // return $request->get('body');
        // return $request->body;

        // return $request->all();

        // $post = new Post;
        // // title
        // $post->title = $request->title;
        // // slug
        // // $post->slug = str_slug($request->title);
        // // preview
        // $post->preview = $request->preview;
        // // body
        // $post->body = $request->body;
        // // category_id
        // $post->category_id = $request->category_id;
        // // user_id
        // // $post->user_id = \Auth::user()->id;
        // // $post->user_id = auth()->user()->id;
        // $post->user_id = auth()->id();

        // $post->save();

        $post = auth()->user()->posts()->create($request->all('title', 'preview', 'body', 'category_id'));

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post);
    }
}
