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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('CANTIDAD');
            
            $table->integer('ID_COMPRADOR')->unsigned();
            $table->foreign('ID_COMPRADOR')->references('ID')->on('usuarios');
    
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
        Schema::dropIfExists('transacciones');
    }
};
