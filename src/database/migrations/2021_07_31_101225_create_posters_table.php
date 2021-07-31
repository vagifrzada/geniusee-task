<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostersTable extends Migration
{
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movie_id');
            $table->string('path');

            $table->foreign('movie_id')
                ->references('id')->on('movies')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posters');
    }
}
