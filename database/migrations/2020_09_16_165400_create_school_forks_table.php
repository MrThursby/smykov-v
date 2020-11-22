<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolForksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_forks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id');

            $table->string('title');
            $table->unsignedInteger('price');

            $table->timestamps();

            $table->foreign('course_id')
                ->references('id')
                ->on('school_courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_forks');
    }
}
