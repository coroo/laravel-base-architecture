<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $userType = $faker->randomElement($array = array('sys-admin','reg-admin','reg-head', 'user'));
    return [
        'nama_aslu' => $faker->name,
        'nama_hijrah' => $faker->name,
        'username' => $faker->randomNumber(7),
        'user_type' => $userType,
        // 'email_verified_at' => now(),
        'password' => '$2y$10$0Ymlhg64YIHjSmVc8rVKYuPd0m8QbtiwMa5LxbY6hQEak7QzJvf5a', // secretsekali
        'remember_token' => Str::random(10),
    ];
});
