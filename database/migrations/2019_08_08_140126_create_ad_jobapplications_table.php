<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdJobapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_jobapplications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sexe');
            $table->string('domaine');
            $table->string('age');
            $table->string('poste');
            $table->string('niveau');
            $table->string('diplome');
            $table->string('anneExp');

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
        Schema::dropIfExists('ad_jobapplications');
    }
}
