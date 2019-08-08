<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdJoboffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_joboffers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('domaine');
            $table->string('entreprise');
            $table->string('adresse');
            $table->string('poste');
            $table->string('salaire');
            $table->string('diplomeRequis');

            $table->bigInteger('id_annonce')->unsigned();
            $table->foreign('id_annonce')->references('id')->on('annonces');

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
        Schema::dropIfExists('ad_joboffers');
    }
}
