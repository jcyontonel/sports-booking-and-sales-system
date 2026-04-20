<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Jhonnatan',
            'apellidos' => 'Yontonel Sotelo',
            'dni' => '47803338',
            'telefono' => '2356956',
            'rol' => 0,
            'email' => 'jcyontonel@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        factory(App\User::class, 50)->create();
    }
}
