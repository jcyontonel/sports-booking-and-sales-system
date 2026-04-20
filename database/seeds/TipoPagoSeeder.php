<?php

use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pago')->insert([
            'nombre' => 'Tarjeta',
            'estado' => 1
        ]);
        DB::table('tipo_pago')->insert([
            'nombre' => 'En Local',
            'estado' => 1
        ]);
    }
}
