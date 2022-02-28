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
        //
        Schema::create('transacciones', function (Blueprint $table) {

            $table->engine="InnoDB";

            $table->bigIncrements('ID');

            $table->integer('CANTIDAD');

            $table->biginteger('ID_COMPRADOR')->unsigned()->unique();

            $table->biginteger('ID_PRODUCTO')->unsigned()->unique();

            $table->foreign('ID_COMPRADOR')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('ID_PRODUCTO')->references('id')->on('PRODUCTOS')->onDelete('cascade');

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
        //
    }
};
