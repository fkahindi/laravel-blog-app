<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('topic_id')->index();
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('image')->nullable();
            $table->string('image_caption')->nullable();
            $table->boolean('published')->default(0);

            $table->foreign('topic_id')->references('id')->on('topics');
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
        Schema::dropIfExists('posts');
    }
};
