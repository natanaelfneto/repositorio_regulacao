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
        Schema::create('need_regulations_regulation_profession', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           
            $table->unsignedInteger('regulations_id');
            $table->unsignedInteger('professions_id');

            $table->foreign('regulations_id')->references('id')->on('need_regulations')->onDelete('DO NOTHING');
            $table->foreign('professions_id')->references('id')->on('need_professions')->onDelete('DO NOTHING');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('need_regulations_regulation_profession');
    }
};
