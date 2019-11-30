<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdimmobiliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adimmobiliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('typeBien');
            $table->string('superficie');
            $table->string('nbrePiece');
            $table->string('etage');

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
        Schema::dropIfExists('adimmobiliers');
    }
}
