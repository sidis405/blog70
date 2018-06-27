<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 10)->create();
        // $categories = [
        //     'php',
        //     'laravel',
        //     'vuejs',
        // ];

        $tags = factory(Tag::class, 20)->create();


        // primo utente come admin
        User::create(
            [
                'name' => 'Sid',
                'email' => 'forge405@gmail.com',
                'password' => bcrypt('sapiens'),
                'role' => 'admin',
            ]
        );

        factory(User::class, 9)->create();

        // 10 utenti
        $users = User::all();

        // 15 posts
        // ciascun post prenda una Category random da 10 create
        foreach ($users as $user) {
            $posts = factory(Post::class, 15)->create(
                [
                    'user_id' => $user->id,
                    'category_id' => collect($categories)->random()->id,
                ]
            );

            // ciascun post prenda tre Tag random da 20 creati
            foreach ($posts as $post) {
                $postTags = $tags->pluck('id')->random(3); // 3 elementi

                // foreach ($tags as $tag) {
                //     // $post->tags()->attach($tag);
                //     // $post->tags()->detach($tag);
                // }

                $post->tags()->sync($postTags);
            }
        }
    }
}
