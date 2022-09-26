<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\Order\Models\Order;
use Faker\Generator as Faker;
use Carbon\Carbon;


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

$factory->define(Order::class, function (Faker $faker) {
    return [
        'total_amount' => 200000,
        'created_at'   => Carbon::now()->subDays(rand(0, 30)),
        'updated_at'   => Carbon::now(),
    ];
});
