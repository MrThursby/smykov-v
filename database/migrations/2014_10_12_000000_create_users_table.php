<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('name');

            $table->longText('about')->nullable();

            $table->char('phone', 11)->nullable();
            $table->boolean('phone_opened')->default(0);

            $table->string('email')->unique();
            $table->boolean('email_opened')->default(0);

            $table->timestamp('email_verified_at')->nullable();

            $table->string('telegram')->nullable();
            $table->string('vk')->nullable();
            $table->string('skype')->nullable();
            $table->string('direct')->nullable();
            $table->string('whats_app')->nullable();

            $table->string('password');

            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
