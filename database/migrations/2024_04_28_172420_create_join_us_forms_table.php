<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('join_us_forms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('join_us_position_id');
            $table->foreign('join_us_position_id')->references('id')->on('join_us_positions')->onDelete('cascade');

            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->text('message');

            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_us_forms');
    }
};
