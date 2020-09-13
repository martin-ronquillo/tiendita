<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        //Foreign key en usuarios
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('provincia_id')->references('id')->on('provincias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en compras
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en ventas
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pago_id')->references('id')->on('pagos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('envio_id')->references('id')->on('envios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en transaccions
        Schema::table('transaccions', function (Blueprint $table) {
            $table->foreign('compra_id')->references('id')->on('compras')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('venta_id')->references('id')->on('ventas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pago_id')->references('id')->on('pagos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('envio_id')->references('id')->on('envios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en opinions
        Schema::table('opinions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en productos
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en preguntas
        Schema::table('preguntas', function (Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en respuestas
        Schema::table('respuestas', function (Blueprint $table) {
            $table->foreign('pregunta_id')->references('id')->on('preguntas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        //Foreign key en favoritos
        Schema::table('favoritos', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
