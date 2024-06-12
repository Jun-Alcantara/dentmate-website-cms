<?php

use App\Models\Services;
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
        Services::all()->each(function ($service) {
            $slug = str_replace(' ', '-', $service->name) . '-' . now()->timestamp;
            $service->slug = $slug;
            $service->save();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Services::whereNotNull('services')
            ->update(['slug' => null]);
    }
};
