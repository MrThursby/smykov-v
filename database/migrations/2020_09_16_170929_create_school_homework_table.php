<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_homework', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('author_id');

            $table->longText('content');
            $table->longText('response')->nullable();

            $table->integer('mark')->nullable();
            $table->boolean('allow_next')->default(1);

            $table->timestamps();

            $table->foreign('lesson_id')
                ->references('id')
                ->on('school_lessons');
            $table->foreign('author_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_homework');
    }
}
