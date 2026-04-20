<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcliente')->unsigned()->nullable();
            $table->integer('idempleado')->unsigned()->nullable();
            $table->integer('idpago')->unsigned();
            $table->date('fecha');
            $table->char('estado'); // 1 => Reservado, 2 => Finalizado, 3=>Cancelado
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
        Schema::dropIfExists('evento');
    }
}
