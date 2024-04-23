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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->string("image");
            $table->longText("short_description");
            $table->longText("long_description");
            $table->string("demo_url")->nullable();
            $table->string("slug");
            $table->boolean("status")->default(true);
            $table->json("socials");
            $table->json('meta_title')->nullable();
            $table->string('meta_image')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
