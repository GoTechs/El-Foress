<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateImmobilierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adimmobiliers', function (Blueprint $table) {
            $table->string('typeBien')->nullable()->change();
            $table->string('superficie')->nullable()->change();
            $table->string('nbrePiece')->nullable()->change();
            $table->string('etage')->nullable()->change();
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
