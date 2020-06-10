<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $gender = $faker->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]);

    return [
        'age' => $faker->numberBetween(18, 55),
        'picture_main' => url("https://picsum.photos/300/300"),
        'gender' => $gender,
        'bio' => $faker->realText(100)
    ];
});
