<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('producto')->insert([
            'nombre' => 'Alquiler 10 camisetas',
            'descripcion' => $faker->text(350),
            'foto' => 'images/products/9.jpeg',
            'idtipoproducto' => '2',
            'stock' => 20,
            'precio' => 0
        ]);
        DB::table('producto')->insert([
            'nombre' => '10 agua mineral',
            'descripcion' => $faker->text(350),
            'foto' => 'images/products/9.jpeg',
            'idtipoproducto' => '1',
            'stock' => 30,
            'precio' => 12.00
        ]);
        factory(App\Producto::class, 100)->create();
    }
}
