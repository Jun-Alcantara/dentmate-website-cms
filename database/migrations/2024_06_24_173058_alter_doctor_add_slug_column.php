<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Doctor;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('slug')
                ->after('id')
                ->nullable();
        });

        Doctor::all()->map(function ($doctor) {
            $slug = str_replace(" ", "-", $doctor->name) . "-" . uniqid();
            $doctor->slug = $slug;
            $doctor->save();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
