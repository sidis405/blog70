<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);

        // View composer
        \View::composer('sidebar.main', function ($view) {
            // \View::composer('layouts.app', function ($view) {
            // \View::composer(['sidebar.main', 'posts._form'], function ($view) {
            $categories = Category::whereHas('posts')->withCount('posts')->orderBy('posts_count', 'DESC')->get();

            $tags = Tag::whereHas('posts')->withCount('posts')->get();

            $archive = [];


            $view->with('categories', $categories)->with('tags', $tags)->with('archive', $archive);
        });

        \View::composer('posts._form', function ($view) {
            $categories = Category::get();
            $tags = Tag::get();

            $view->with('categories', $categories)->with('tags', $tags);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
