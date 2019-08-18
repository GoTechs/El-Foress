<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_storages', function (Blueprint $table) {
            $table->string('type')->nullable()->change();
            $table->string('marque')->nullable()->change();
            $table->string('capacite')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_storages', function (Blueprint $table) {
            //
        });
    }
}
