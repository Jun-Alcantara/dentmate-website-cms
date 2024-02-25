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
        Schema::create('homepage_why_dentmates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slot_number');
            $table->string('photo_url')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('sort')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_why_dentmates');
    }
};
