<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function showSportWorkouts($sport)
    {
        // Example: You can define workouts per sport here or fetch from DB
        $workouts = $this->getWorkoutsBySport($sport);

        // Pass the sport and workouts to the view
        return view('workouts.sport', compact('sport', 'workouts'));
    }

    public function create()
{
    return view('workouts.create', [
        'workouts' => [], // or omit if using a separate template
    ]);
}


    private function getWorkoutsBySport($sport)
{
    $allWorkouts = [
        'basketball' => [
            ['title' => 'Dribbling drills', 'description' => 'Practice dribbling with cones to improve ball control.'],
            ['title' => 'Shooting practice', 'description' => 'Improve your jump shot accuracy from different spots on the court.'],
            ['title' => 'Team offense', 'description' => 'Learn set plays and movement to enhance teamwork and scoring.'],
        ],
        'football' => [
            ['title' => 'Passing drills', 'description' => 'Work on short and long passes to improve accuracy and timing.'],
            ['title' => 'Kicking practice', 'description' => 'Improve field goal accuracy and power through focused kicking exercises.'],
            ['title' => 'Endurance running', 'description' => 'Build stamina for the game with interval and long-distance running.'],
        ],
        'hockey' => [
            ['title' => 'Stickhandling drills', 'description' => 'Enhance your puck control and agility on the ice.'],
            ['title' => 'Speed skating', 'description' => 'Boost your skating speed and acceleration.'],
            ['title' => 'Shooting practice', 'description' => 'Improve shot accuracy and power from different angles.'],
        ],
        'volleyball' => [
            ['title' => 'Serving drills', 'description' => 'Practice consistent and powerful serves.'],
            ['title' => 'Setting techniques', 'description' => 'Learn precise setting to assist your hitters.'],
            ['title' => 'Cardio training', 'description' => 'Increase your cardiovascular health to stay active on the court.'],
        ],
        'cycling' => [
            ['title' => 'Hill climbing', 'description' => 'Strengthen leg muscles and endurance by practicing hill climbs.'],
            ['title' => 'Interval training', 'description' => 'Boost cardiovascular capacity with high-intensity intervals.'],
            ['title' => 'Long-distance rides', 'description' => 'Build endurance with steady long-distance cycling sessions.'],
        ],
        'tennis' => [
            ['title' => 'Forehand drills', 'description' => 'Improve the power and accuracy of your forehand shots.'],
            ['title' => 'Footwork exercises', 'description' => 'Enhance agility and speed on the court.'],
            ['title' => 'Strength training', 'description' => 'Build overall fitness and muscle strength to improve performance.'],
        ],
    ];

    

    return $allWorkouts[$sport] ?? [];
}

}
 