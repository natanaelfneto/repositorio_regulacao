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
        Schema::create('need_regulation_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_name')->nullable();
            $table->timestamp('regulation_type_created_at')->nullable();
            $table->foreignId('regulation_type_created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('need_regulation_types');
    }
};
