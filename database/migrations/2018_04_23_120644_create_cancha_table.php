<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanchaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100)->unique();
            $table->string('descripcion')->nullable();
            $table->string('img_portada')->nullable();
            $table->string('img_lista')->nullable();
            $table->string('ubicacion');
            $table->decimal('ancho');
            $table->decimal('largo');
            $table->decimal('costo'); // El costo es por media hora
            $table->decimal('costoevento'); // Costo por día
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
        Schema::dropIfExists('cancha');
    }
}
