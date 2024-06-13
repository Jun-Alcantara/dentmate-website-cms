<?php

use App\Models\Branch;
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
        Schema::table('branches', function (Blueprint $table) {
            $table->string('slug')
                ->after('id')
                ->nullable();
        });

        Branch::all()->each(function ($branch) {
            $slug = str_replace(' ', '-', $branch->name) . '-' . now()->timestamp;
            $branch->slug = strtolower($slug);
            $branch->save();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
