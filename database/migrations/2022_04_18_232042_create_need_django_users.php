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
        Schema::create('need_django_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           
            $table->string('password');
            $table->timestamp('last_login');
						$table->boolean('active');
						$table->timestamp('created_at');
						$table->string('department');
						$table->unsignedInteger('email');
						$table->string('phone');
						$table->boolean('first_authentication');
						$table->string('first_name');
						$table->string('last_name');
						$table->boolean('password_reset_request');
						$table->string('username');
						$table->boolean('staff');
						$table->boolean('superuser');

            $table->foreign('created_by_id')->references('id')->on('need_django_users')->onDelete('DO NOTHING');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('need_django_users');
    }
};
