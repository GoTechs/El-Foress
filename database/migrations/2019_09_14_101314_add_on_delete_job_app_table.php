<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteJobAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_jobapplications', function (Blueprint $table) {
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
        Schema::table('ad_jobapplications', function (Blueprint $table) {
            //
        });
    }
}