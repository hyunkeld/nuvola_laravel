<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_cliente');
            $table->string('pais');
            $table->string('departamento');
            $table->string('ciudad');
            $table->timestamp('fecha_viaje');
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('email_cliente')->references('email')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('viajes', function (Blueprint $table) {
            $table->dropForeign(['email_cliente']);           
        });*/
        Schema::dropIfExists('viajes');
    }
}
