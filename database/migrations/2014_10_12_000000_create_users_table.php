<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 80);
            $table->string('apellidos', 80);
            $table->string('dni', 8);
            $table->string('telefono', 20)->nullable();
            $table->char('rol',1)->default(3); // 0=>SuperAdmin, 1=>Admin, 2=>asistente, 3=>cliente
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
