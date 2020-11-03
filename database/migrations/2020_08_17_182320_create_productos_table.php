<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('caracteristicas')->nullable();
            $table->text('descripcion')->nullable();
            $table->float('precio', 8, 3);
            $table->integer('stock');
            //$table->string('picture_one')->nullable();
            //$table->string('picture_two')->nullable();
            //$table->string('picture_three')->nullable();
            //$table->string('picture_four')->nullable();
            //$table->string('picture_five')->nullable();
            $table->enum('estado', ['Nuevo', 'Usado'])->nullable();
            $table->unsignedBigInteger('categoria_id')->index();
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
        Schema::dropIfExists('productos');
    }
}
