<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('dateHeureEvent');
            $table->date('du');
            $table->date('au');

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
        Schema::dropIfExists('ad_events');
    }
}
