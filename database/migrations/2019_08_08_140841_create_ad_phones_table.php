<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marque');
            $table->string('modele');

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
        Schema::dropIfExists('ad_phones');
    }
}
