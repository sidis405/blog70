<?php

namespace App;

use App\Events\PostWasUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    // protected $fillable = ['title', 'user_id', 'category_id', 'preview', 'fillable'];
    protected $guarded = [];

    protected $connection = 'db02';
    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($post) {
    //         //rimuovi immagine
    //         Storage::delete(str_replace('/storage/', '', $post->cover));
    //         // rimuovi associazioni con tags
    //         $post->tags()->sync([]);
    //     });

    //     static::updated(function ($post) {
    //         event(new PostWasUpdated($post));
    //     });

    //     // static::created(function ($post) {
    //     //     event(new PostWasCreated($post));
    //     // });
    // }


    // appartiene a 1+ Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // appartiene a 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // appartiene a 1 Catagory
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ha 1+ Comment morph
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // getters = accessros - modifcano il dato che provviene dal database prima di restituirlo
    public function getTitleAttribute($title)
    {
        return $title;
        // return strtoupper($title);
    }

    public function getCoverAttribute($cover)
    {
        return '/storage/' . (($cover) ?? 'covers/cover.jpg'); // null coalescence oprator
    }

    // setters = mutators - modificano il dato prima di salvarlo nel database
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function setCoverAttribute($cover)
    {
        $this->attributes['cover'] = $cover->store('covers');
    }

    public function tagLinks()
    {
        // $tagLinks = $this->tags->map(function ($tag) {
        //     return '<a href="' . route('tags.show', $tag) .  '">' . $tag->name . '</a>';
        // })->toArray();

        $tagLinks = [];

        foreach ($this->tags as $tag) {
            $tagLinks[] = '<a href="' . route('tags.show', $tag) .  '">' . $tag->name . '</a>';
        }

        return join(', ', $tagLinks);
    }
}
