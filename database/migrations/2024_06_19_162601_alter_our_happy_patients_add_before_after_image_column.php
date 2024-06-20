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
        Schema::table('patient_testimonials', function (Blueprint $table) {
            $table->string('before_after_photo_url')
                ->after('photo_url')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_testimonials', function (Blueprint $table) {
            $table->dropColumn('before_after_photo_url');
        });
    }
};
