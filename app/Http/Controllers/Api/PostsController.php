<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use SHARED_STUFF\Repositories\PostsRepository;

class PostsController extends Controller
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->middleware('jwt.auth')->except('index', 'show'); //eccetto index, show
        $this->postsRepository = $postsRepository;
    }

    public function index()
    {
        return $this->postsRepository->getAll()->get();
    }

    public function show(Post $post)
    {
        return $post->load('user', 'category', 'tags', 'comments.replies');
    }

    public function store(PostRequest $request)
    {
        $post = $this->postsRepository->store($request);

        return response()->json([
            'response' => 'success',
            'message' => 'Post was created',
            'post' => $post,
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());
        $post->tags()->sync($request->tags);

        return response()->json([
            'response' => 'success',
            'message' => 'Post was updated',
            'post' => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json([
            'response' => 'success',
            'message' => 'Post was deleted',
            'deleted_post' => $post,
        ]);
    }
}
