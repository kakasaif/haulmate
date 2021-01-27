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

$factory->define(User::class, function (Faker $faker)
{
    $gender = $faker->randomElement(['male', 'female']);
    $photos = [
        'male' => [
            'assets/img/user1.png',
            'assets/img/user3.png',
            'assets/img/user4.png',
            'assets/img/user5.png',
        ],
        'female' => ['assets/img/user2.png']
    ];
    $photo = 
    $name = $faker->name($gender);
    $name_parts = explode(' ', $name);
    $first_name = $name_parts[0];
    $last_name = trim(substr($name, strlen($first_name)));
    return [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'photo_url' => $photo,
        'gender' => $gender,
        'remember_token' => Str::random(10),
    ];
});
