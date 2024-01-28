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
        Schema::create('silder_pages', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->string('button_link');
            $table->json('button_title');
            $table->string('video')->nullable();
            $table->string('image');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silder_pages');
    }
};
