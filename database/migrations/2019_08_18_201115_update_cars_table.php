<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_cars', function (Blueprint $table) {
            $table->string('vente')->nullable()->change();
            $table->string('marque')->nullable()->change();
            $table->string('modele')->nullable()->change();
            $table->string('annee')->nullable()->change();
            $table->string('kilometrage')->nullable()->change();
            $table->string('typeCarb')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_cars', function (Blueprint $table) {
            //
        });
    }
}
