<?php

use Illuminate\Database\Seeder;

class TipoProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_producto')->insert([
            'nombre' => 'Bebidas',
            'estado' => 1
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'Alquiler',
            'estado' => 1
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'Polos',
            'estado' => 1
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'Peotas',
            'estado' => 1
        ]);
        DB::table('tipo_producto')->insert([
            'nombre' => 'Articulos deportivos',
            'estado' => 1
        ]);
    }
}
