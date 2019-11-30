<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJobapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_jobapplications', function (Blueprint $table) {
            $table->string('sexe')->nullable()->change();
            $table->string('domaine')->nullable()->change();
            $table->string('age')->nullable()->change();
            $table->string('poste')->nullable()->change();
            $table->string('niveau')->nullable()->change();
            $table->string('diplome')->nullable()->change();
            $table->string('anneExp')->nullable()->change();
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
