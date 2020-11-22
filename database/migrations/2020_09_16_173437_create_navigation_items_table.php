<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('menu_id');

            $table->string('title');
            $table->string('fa-icon');

            $table->nullableMorphs('menuable');

            $table->timestamps();

            $table->foreign('menu_id')
                ->references('id')
                ->on('navigation_menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_items');
    }
}
