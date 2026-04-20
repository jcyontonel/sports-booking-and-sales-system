<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->word,
        'descripcion' => $faker->text(350),
        'foto' => $faker->randomElement(array('images/products/1.jpeg',
                                                'images/products/2.jpeg', 
                                                'images/products/3.jpeg', 
                                                'images/products/4.jpeg', 
                                                'images/products/5.jpeg', 
                                                'images/products/6.jpeg', 
                                                'images/products/7.jpeg', 
                                                'images/products/8.jpeg', 
                                                'images/products/9.jpeg', 
                                                'images/products/10.jpeg', 
                                                'images/products/11.jpeg', 
                                                'images/products/12.jpeg', 
                                                'images/products/13.jpeg', 
                                                'images/products/14.jpeg', 
                                                'images/products/15.jpeg', 
                                                'images/products/16.jpg', 
                                                'images/products/17.jpg', 
                                                'images/products/18.jpg', 
                                                'images/products/19.jpg', 
                                                'images/products/20.jpg')),
        'stock' => $faker->numberBetween(10, 100),
        'precio' =>$faker->randomFloat(2, 1, 100),
        'idtipoproducto' => $faker->numberBetween(1, 5),
    ];
});