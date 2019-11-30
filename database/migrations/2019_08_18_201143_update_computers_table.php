<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_computers', function (Blueprint $table) {
            $table->string('marque')->nullable()->change();
            $table->string('tailleEcran')->nullable()->change();
            $table->string('processeur')->nullable()->change();
            $table->string('ram')->nullable()->change();
            $table->string('tailleDisque')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_computers', function (Blueprint $table) {
            //
        });
    }
}
