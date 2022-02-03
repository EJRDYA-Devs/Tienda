<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')
                ->references('id')
                ->on('productos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_comprador');
            $table->foreign('id_comprador')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
}
