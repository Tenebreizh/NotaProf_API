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

$factory->define(App\Appreciation::class, function (Faker\Generator $faker) {
    $levels = array('-', '+', '=');
    return [
        'content' => $faker->sentence(6),
        'level' => $levels[rand(0,2)],
        'category_id' => rand(1,5),
    ];
});
