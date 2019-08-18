<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annonces', function (Blueprint $table) {
            $table->string('titre')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->integer('prix')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phoneNumber')->nullable()->change();
            $table->string('etat')->nullable()->change();
            $table->boolean('phoneHide')->nullable()->change();
            $table->string('wilaya')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('annonces', function (Blueprint $table) {
            //
        });
    }
}
