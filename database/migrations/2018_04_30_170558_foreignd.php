<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foreignd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->foreign('iduser')->references('id')->on('users');
        });
        Schema::table('reserva', function (Blueprint $table) {
            $table->foreign('idcliente')->references('id')->on('cliente');
            $table->foreign('idempleado')->references('id')->on('empleado');
        });
        Schema::table('producto', function (Blueprint $table) {
            $table->foreign('idtipoproducto')->references('id')->on('tipo_producto');
        });
        Schema::table('venta', function (Blueprint $table) {
            $table->foreign('idcliente')->references('id')->on('cliente');
            $table->foreign('idempleado')->references('id')->on('empleado');
        });
        Schema::table('pago', function (Blueprint $table) {
            $table->foreign('idempleado')->references('id')->on('empleado');
            $table->foreign('idtipopago')->references('id')->on('tipo_pago');
        });
        Schema::table('producto_venta', function (Blueprint $table) {
            $table->foreign('idproducto')->references('id')->on('producto');
            $table->foreign('idventa')->references('id')->on('venta');
        });
        Schema::table('cancha_reserva', function (Blueprint $table) {
            $table->foreign('idcancha')->references('id')->on('cancha');
            $table->foreign('idreserva')->references('id')->on('reserva');
        });
        Schema::table('venta_pago', function (Blueprint $table) {
            $table->foreign('idventa')->references('id')->on('venta');
            $table->foreign('idpago')->references('id')->on('pago');
        });
        Schema::table('reserva_pago', function (Blueprint $table) {
            $table->foreign('idreserva')->references('id')->on('reserva');
            $table->foreign('idpago')->references('id')->on('pago');
        });
        Schema::table('empleado', function (Blueprint $table) {
            $table->foreign('iduser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
