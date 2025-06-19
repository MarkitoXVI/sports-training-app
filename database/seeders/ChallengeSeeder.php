<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Challenge;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
public function run()
{
    Challenge::insert([
        [
            'title' => '3-Point Shooting Drill',
            'athlete_name' => 'Stephen Curry',
            'athlete_image' => '/images/athletes/curry.jpg',
            'description' => 'Make 50 three-pointers in under 5 minutes.',
            'difficulty' => 'Hard',
            'created_at' => now(), 'updated_at' => now(),
        ],
        [
            'title' => 'Endurance Sprint Challenge',
            'athlete_name' => 'Alphonso Davies',
            'athlete_image' => '/images/athletes/davies.jpg',
            'description' => 'Complete 10x100m sprints with 20 seconds rest in between.',
            'difficulty' => 'Intermediate',
            'created_at' => now(), 'updated_at' => now(),
        ],
        [
            'title' => 'Volleyball Jump Challenge',
            'athlete_name' => 'Karch Kiraly',
            'athlete_image' => '/images/athletes/kiraly.jpg',
            'description' => 'Perform 30 spike jumps with proper form.',
            'difficulty' => 'Easy',
            'created_at' => now(), 'updated_at' => now(),
        ],
    ]);
}

}
