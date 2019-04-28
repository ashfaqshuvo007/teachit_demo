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
            $table->bigIncrements('comment_id');
            $table->text('comment_body');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('videos_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('videos_id')->references('videos_id')->on('videos');
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
