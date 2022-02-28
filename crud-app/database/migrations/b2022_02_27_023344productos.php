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
        Schema::create('productos', function (Blueprint $table) {

            $table->engine="InnoDB";

            $table->bigIncrements('id')->unsigned()->unique();

            $table->string('NOMBRE');

            $table->string('DESCRIPCION');

            $table->integer('CANTIDAD');

            $table->biginteger('id_categoria')->unsigned();

            $table->boolean('ESTADO')->default(0)->change();

            $table->biginteger('ID_VENDEDOR')->unsigned();

            $table->foreign('ID_VENDEDOR')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');

            
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
