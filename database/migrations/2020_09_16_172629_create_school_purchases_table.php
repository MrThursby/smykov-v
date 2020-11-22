<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_purchases', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('purchaser_id');
            $table->unsignedBigInteger('fork_id')->nullable()->default(null);
            $table->unsignedBigInteger('course_id');
            $table->unsignedInteger('spent_rubles');

            $table->timestamps();

            $table->foreign('purchaser_id')
                ->references('id')
                ->on('users');
            $table->foreign('fork_id')
                ->references('id')
                ->on('school_forks');
            $table->foreign('course_id')
                ->references('id')
                ->on('school_courses');

            $table->unique(['purchaser_id', 'fork_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_purchases');
    }
}
