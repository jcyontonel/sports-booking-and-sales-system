<?php

use Illuminate\Database\Seeder;

class CanchaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cancha')->insert([
            'nombre' => 'Cancha 1',
            'img_portada' => 'images/cancha-portada/1.jpg',
            'img_lista' => 'images/cancha-lista/1.jpg',
            'ubicacion' => 'Enrique Palacios #238',
            'ancho' => 15,
            'largo' => 30,
            'costo' => 35,
            'costoevento' => 500
        ]);
        DB::table('cancha')->insert([
            'nombre' => 'Cancha 2',
            'img_portada' => 'images/cancha-portada/2.jpg',
            'img_lista' => 'images/cancha-lista/2.jpg',
            'ubicacion' => 'Enrique Palacios #238',
            'ancho' => 10,
            'largo' => 23,
            'costo' => 20,
            'costoevento' => 380
        ]);
    }
}
