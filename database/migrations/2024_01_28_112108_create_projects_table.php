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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_project_id');
            $table->foreign('category_project_id')->references('id')->on('category_projects')->onDelete('cascade');
            $table->json('title');
            $table->string('image');
            $table->json('description');
            $table->date('date');
            $table->json('client_name');
            $table->string('website');
            $table->string('location');
            $table->json('meta_title')->nullable();
            $table->string('meta_image')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
