<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create(
            [
                'name' => 'Admin',
                //'jobtitle' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => '$2y$12$Mh7kjb4lW/nTFadihGaXheJj46m45WR08O179O62YkKZFTWx3/4Vm',
                'remember_token' => Str::random(10),
                'is_admin' => true
            ]
        );

    }
}
