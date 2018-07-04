<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;
    use Notifiable;

    protected $connection = 'db01';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // ha 1+ Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // ha 1+ Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
        // return $this->primaryKey;
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
