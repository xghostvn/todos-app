<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        //    
        'name' => $faker->sentences(4),
        'description'=>$faker->paragraph(20),
        'completed' => false


        
    ];
});
