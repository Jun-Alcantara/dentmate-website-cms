<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::UpdateOrCreate([
            'email' => 'admin@dentmate'
        ], [
            'name' => 'Site Administrator',
            'email' => 'admin@dentmate',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60)
        ]);
    }
}
