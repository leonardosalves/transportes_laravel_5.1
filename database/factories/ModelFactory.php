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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\categorias::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name
    ];
});

$factory->define(App\fornecedores::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'endereco' => $faker->address
    ];
});

$factory->define(App\produtos::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'marca' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'categoria_id' => $faker->numberBetween($min = 1, $max = 50),
        'fornecedor_id' => $faker->numberBetween($min = 1, $max = 50),
        'estoque_atual' => $faker->numberBetween($min = 0, $max = 0),
        'valor' => $faker->numberBetween($min = 55, $max = 3000),
        'observacao' => $faker->text($maxNbChars = 50) 
    ];
});

