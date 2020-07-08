<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_vehicules', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('kilometrage');
            $table->string('date');
            $table->integer('nomre_chang_pneu');
            $table->integer('nombre_maintenance');
            $table->float('etat_batterie');
            $table->string('immatriculation');
            $table->integer('vehicule_id')->unsigned();
            $table->foreign('vehicule_id')->references('id')->on('vehicules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etat_vehicules');
    }
}
