<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_lessons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('section_id');

            $table->string('title');
            $table->string('src');
            $table->longText('homework');

            $table->boolean('commentable');
            $table->unsignedInteger('local_id');

            $table->float('mark')->nullable();

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->foreign('section_id')
                ->references('id')
                ->on('school_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_lessons');
    }
}
