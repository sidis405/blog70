<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    // title
    // slug
    // preview
    // body
    // user_id
    // category_id

    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'preview' => $faker->paragraph,
        'body' => $faker->paragraphs(10, true), // produci come stringa e non array
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },

        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
    ];
});
