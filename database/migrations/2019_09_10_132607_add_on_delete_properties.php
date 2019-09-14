<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adimmobiliers', function (Blueprint $table) {
           $table->dropForeign(['id_annonce']);
           $table->foreign('id_annonce')->references('id')->on('annonces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adimmobiliers', function (Blueprint $table) {
            //
        });
    }
}
