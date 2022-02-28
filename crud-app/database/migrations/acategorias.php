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


        Schema::create('categoria_producto', function (Blueprint $table) {

            $table->engine="InnoDB";

            $table->biginteger('id_categoria')->unsigned()->unique();

            $table->biginteger('id_producto')->unsigned()->unique();

            $table->foreign('id_categoria')->references('id')->on('PRODUCTOS')->onDelete('cascade');

            $table->foreign('id_producto')->references('id')->on('CATEGORIAS')->onDelete('cascade');
            
           
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
