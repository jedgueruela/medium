<?php

use App\Article;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Article::class, function (Faker $faker) {
	$title = $faker->sentence(rand(1,5));
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(10),
    ];
});
