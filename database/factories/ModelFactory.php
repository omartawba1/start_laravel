<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => 'Admin',
        'email'          => 'admin@admin.com',
        'password'       => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Section::class, function (Faker\Generator $faker) {
    return [
        'title'      => $faker->sentence(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->word,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    return [
        'title'      => $faker->sentence(),
        'text'       => $faker->paragraph(30),
        'published'  => $faker->boolean(),
        'section_id' => 1,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'text'       => $faker->paragraph(),
        'article_id' => 1,
    ];
});
