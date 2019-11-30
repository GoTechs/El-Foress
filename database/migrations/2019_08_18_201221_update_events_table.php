<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_events', function (Blueprint $table) {
            $table->dateTime('dateHeureEvent')->nullable()->change();
            $table->date('du')->nullable()->change();
            $table->date('au')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_events', function (Blueprint $table) {
            //
        });
    }
}
