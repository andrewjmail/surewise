<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NavigationCategory;
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

$factory->define(NavigationCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'colour' => $faker->colorName,
        'order' => $faker->numberBetween(0,5),
        'navigation_id' => function() {
            return factory(App\Navigation::class)->create()->id;
        }
    ];
});
