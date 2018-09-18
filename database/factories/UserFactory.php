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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Model\user\partial\message::class, function (Faker $faker) {

    do{
        $from = rand(1,13);
        $to = rand(1,13);
    }while ($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'content' => $faker->sentence,
    ];
});
