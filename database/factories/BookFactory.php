<?php

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

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title'   => function () use ($faker){
            $sentence = $faker->sentence(7);
            return substr($sentence, 0, strlen($sentence) - 1);
        },
        'body'    => $faker->text,
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});
