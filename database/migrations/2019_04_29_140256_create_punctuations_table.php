<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePunctuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punctuations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_points');
            $table->integer('team_id')->unsigned();
            $table->integer('total_wins');
            $table->integer('total_loses');
            $table->integer('total_draw');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punctuations');
    }
}
