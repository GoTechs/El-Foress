<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->text('description');
            $table->integer('prix');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('etat');
            $table->boolean('phoneHide');

            $table->bigInteger('id_Cat')->unsigned();
            $table->foreign('id_Cat')->references('idCat')->on('categories');

            $table->bigInteger('id_sous_Cat')->unsigned();
            $table->foreign('id_sous_Cat')->references('idSousCat')->on('souscategories');

            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
