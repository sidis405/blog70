<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $name = ucfirst($faker->unique()->word);

    return [
            // name
            'name' => $name,
            // slug
            'slug' => str_slug($name),
        ];
});
