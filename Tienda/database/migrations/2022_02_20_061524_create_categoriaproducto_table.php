<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->integer('ID_CATEGORIA')->unsigned();
        $table->foreign('ID_CATEGORIA')->references('ID')->on('categorias');

		$table->integer('ID_PRODUCTO')->unsigned();
        $table->foreign('ID_PRODUCTO')->references('id')->on('productos');
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
        Schema::dropIfExists('categoria_producto');
    }
};
