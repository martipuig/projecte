<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canvis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('tipus');
            $table->string('usuari');
            $table->string('operacio');
            $table->timestamp('data');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('canvis');
    }
}
