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
        Schema::create('need_regulations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('regulation_number')->nullable();
            $table->string('regulation_type')->nullable();
            $table->date('regulation_timestamp')->nullable();
            $table->text('regulation_synopsis')->nullable();
            $table->string('regulation_issuer')->nullable();
            $table->text('regulation_full_content')->nullable();
            $table->string('regulation_link')->nullable();
            $table->timestamp('regulation_created_at')->nullable();
            $table->foreignId('regulation_created_by')->nullable();
						$table->string('regulation_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('need_regulations');
    }
};
