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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Construction::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
    ];
});


$factory->define(App\Account::class, function (Faker\Generator $faker) {

    return [
        'bank' => $faker->name,
        'account_number' => $faker->bankAccountNumber,
    ];
});


$factory->define(App\Income::class, function (Faker\Generator $faker) {

    return [
        'construction_id' => random_int(1, 5),
        'account_id' => random_int(1, 5),
        'concept' => $faker->name,
        'quantity' => random_int(1000, 600000),
        'type' => random_int(1, 2)
    ];
});


$factory->define(App\GeneralExpenditure::class, function (Faker\Generator $faker) {

    return [
        'construction_id' => random_int(1, 5),
        'name' => $faker->name,
    ];
});

$factory->define(App\ExpenditureType::class, function (Faker\Generator $faker) {

    return [
        'general_expenditure_id' => random_int(1, 30),
        'name' => $faker->name,
    ];
});

$factory->define(App\Expenditure::class, function (Faker\Generator $faker) {
    $unit_cost = random_int(1000, 2000);
    $quantity = random_int(1, 500);
    $total = $unit_cost * $quantity;

    return [
        'expenditure_type_id' => random_int(1, 100),
        'concept' => $faker->name,
        'measure_unit' => 'm2',
        'unit_cost' => $unit_cost,
        'quantity' => $quantity,
        'total' => $total,
        'deductible' => random_int(0, 1)
    ];
});
