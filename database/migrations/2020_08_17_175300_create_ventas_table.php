<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('estado', ['activo', 'finalizado', 'vendido', 'suspendido'])->default('activo');
            $table->unsignedBigInteger('producto_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('pago_id')->index();
            $table->unsignedBigInteger('envio_id')->index();
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
        Schema::dropIfExists('ventas');
    }
}
