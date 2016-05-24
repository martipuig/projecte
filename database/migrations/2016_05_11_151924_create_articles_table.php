<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatearticlesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomArt',80);
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('categoria_esps_id')->unsigned();
            $table->foreign('categoria_esps_id')->references('id')->on('categoria_esps');
            $table->string('descripcio');
            $table->integer('unitat');
            $table->integer('amplada');
            $table->integer('llargada');
            $table->integer('alcada');
            $table->integer('preu');
            $table->string('estat',12);
            $table->string('notes');
            $table->string('usuariMod',16);
            $table->integer('posicio');
            $table->timestamps();
            $table->softDeletes();
            $table->string('mostrar',3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
