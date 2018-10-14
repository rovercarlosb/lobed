<?php

use App\User;
use Fake\Generator;

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
$factory->define(User::class, function (Faker\Generator $faker) {
    

    $array = [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' =>  bcrypt('carlos'),
        'remember_token' => str_random(10),
        'type' => 'admin',
        'age' => $faker->randomDigit,
    ];

    return $array;

    
});
