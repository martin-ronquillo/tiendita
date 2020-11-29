<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('compra_id')->index();
            $table->unsignedBigInteger('venta_id')->index();
            $table->unsignedBigInteger('pago_id')->index();
            $table->unsignedBigInteger('envio_id')->index();
            $table->enum('estado', ['concretada', 'no concretada', 'problema']);
            $table->date('confirmacion')->nullable();
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
        Schema::dropIfExists('transaccions');
    }
}
