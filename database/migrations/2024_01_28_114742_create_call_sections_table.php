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
        Schema::create('call_sections', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('phone')->nullable();
            $table->string('phone_button_title')->nullable();
            $table->string('email')->nullable();
            $table->string('email_button_title')->nullable();
            $table->string('background_image')->nullable();
            $table->tinyInteger('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_sections');
    }
};
