<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Branch;
use App\Models\Services;

class AddSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Branch::all()->each(function ($branch) {
            $slug = str_replace(' ', '-', $branch->name) . '-' . now()->timestamp;
            $branch->slug = strtolower($slug);
            $branch->save();
        });

        Services::all()->each(function ($service) {
            $slug = str_replace(' ', '-', $service->name) . '-' . now()->timestamp;
            $service->slug = strtolower($slug);
            $service->save();
        });
    }
}
