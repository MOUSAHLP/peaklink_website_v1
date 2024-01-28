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
        Schema::create('our_client_reviews', function (Blueprint $table) {
            $table->id();
    $table->json('description');
    $table->json('client_name');
    $table->json('client_job');
    $table->string('client_image');
    $table->integer('stars');
    $table->tinyInteger('status')->default(true);
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_client_reviews');
    }
};
