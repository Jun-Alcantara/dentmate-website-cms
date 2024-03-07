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
        Schema::create('our_doctors_contents', function (Blueprint $table) {
            $table->id();
            $table->text('primary_photo_url')->nullable();
            $table->string('primary_title')->nullable();
            $table->text('primary_writeup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_doctors_contents');
    }
};
