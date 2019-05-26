<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author_comment_name');
            $table->text('content');
            $table->integer('notice_id')->unsigned()->nullable();
            $table->integer('solicitation_id')->unsigned();
            $table->integer('game_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('notice_id')->references('id')->on('notices');
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('solicitation_id')->references('id')->on('solicitations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
