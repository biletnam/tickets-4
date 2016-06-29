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

use App\User;

$factory->define('App\User', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define('App\Ticket', function (Faker\Generator $faker) {
    return [
        'title' => $faker->paragraph(1),
        'body' => $faker->paragraph(3),
        'user_id' => User::all()->random()->id,
        'closed' => $faker->numberBetween(0,1),
    ];
});
