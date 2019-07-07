<?php

use App\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    $password = bcrypt('123456');

    return [
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => $password,
        'birth_date' => $faker->date('d/m/Y'),
        'genre' => 'Feminino',
        'photo' => '',
        'address' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'neighborhood' => 'Bairro',
        'zip_code' => '27490-090',
        'complement' => 'Complemento',
        'city' => $faker->city,
        'state' => $faker->state
    ];
});
