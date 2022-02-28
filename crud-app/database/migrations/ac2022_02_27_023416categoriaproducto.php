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
       


        Schema::create('categorias', function (Blueprint $table) {

            $table->engine="InnoDB";

            $table->bigIncrements('id')->unsigned()->unique();

            $table->string('NOMBRE');

            $table->string('DESCRIPCION');

            
            
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
