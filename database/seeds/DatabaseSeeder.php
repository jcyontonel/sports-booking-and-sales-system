<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CanchaTableSeeder::class);
        $this->call(TipoProductoTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(TipoPagoSeeder::class);
    }
}
