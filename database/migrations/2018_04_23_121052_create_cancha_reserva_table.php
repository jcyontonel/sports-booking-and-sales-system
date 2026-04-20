<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanchaReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancha_reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->time('tiempo');
            $table->char('estado', 1); // 1=>Espera, 2=>Cancelado, 3=>Terminado, 4=>Walk Over, 5=> jugando
            $table->integer('idcancha')->unsigned();
            $table->integer('idreserva')->unsigned();
            $table->decimal('costo', 8, 2)->unsigned();
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
        Schema::dropIfExists('cancha_reserva');
    }
}
