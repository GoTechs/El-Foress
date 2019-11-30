<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJobofferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_joboffers', function (Blueprint $table) {
            $table->string('domaine')->nullable()->change();
            $table->string('entreprise')->nullable()->change();
            $table->string('adresse')->nullable()->change();
            $table->string('poste')->nullable()->change();
            $table->string('salaire')->nullable()->change();
            $table->string('diplomeRequis')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_joboffers', function (Blueprint $table) {
            //
        });
    }
}
