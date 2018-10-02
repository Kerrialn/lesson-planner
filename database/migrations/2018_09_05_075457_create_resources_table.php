<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->enum('level', ['beginner', 'lower-intermediate', 'intermediate', 'upper-intermediate', 'advanced']);
            $table->enum('skill', ['All', 'reading', 'writing', 'listening', 'speaking']);
            $table->enum('category', ['article', 'lesson plan', 'skill builder',]);
            $table->string('has_phrases')->default(0);
            $table->string('has_homework')->default(0);
            $table->string('has_warmups')->default(0);
            $table->string('has_exercises')->default(0);
            $table->string('has_article')->default(0);
            $table->string('has_vocabulary')->default(0);
            $table->string('has_questions')->default(0);
            $table->string('has_media')->default(0);
            $table->string('has_script')->default(0);
            $table->string('has_wordsearch')->default(0);
            $table->string('is_public')->default(0);
            $table->text('download')->nullable()->default(NULL);
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
        Schema::dropIfExists('resources');
    }
}
