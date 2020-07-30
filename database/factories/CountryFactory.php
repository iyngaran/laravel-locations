<?php

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(
    \Iyngaran\Location\Models\Location::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word)
    ];
}
);