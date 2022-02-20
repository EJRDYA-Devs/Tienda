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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NOMBRE',100);
            $table->string('EMAIL',200);
            $table->string('PASSWORD',200);
            $table->string('REMEMBER_TOKEN',500);
            $table->boolean('VERIFICADO');
            $table->boolean('VERIFICACION_TOKEN');
            $table->boolean('ADMIN');
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
        Schema::dropIfExists('usuarios');
    }
};
