<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutStep;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ChallengeSeeder::class,
        ]);
        User::create([
            'name' => 'admin@admin.admin',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('admin@admin.admin'),
            'email_verified_at' => now(),
        ]);
        Workout::factory()->count(10)->create();
        WorkoutStep::factory()->count(10)->create();
    }

}
