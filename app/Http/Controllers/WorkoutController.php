<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\WorkoutStep;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function showSportWorkouts($sport)
    {


        $workouts = $this->getWorkoutsBySport($sport);
        return view('workouts.sport', compact('sport', 'workouts'));
    }

    public function store(Request $request)
    {
        $sport = $request->sport;
        // return json_encode($request->all());
        $request->validate([
            'sport' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'required|array',
            'steps.*.title' => 'required|string|max:255',
            'steps.*.description' => 'nullable|string',
            'steps.*.repetitions' => 'required|integer|min:1',
            'steps.*.time' => 'required|integer|min:1',
            'steps.*.order' => 'required|integer|min:0',
        ]);

        $workout = new Workout();
        $workout->sport = $request->sport;
        $workout->title = $request->title;
        $workout->description = $request->description;
        $workout->save();
        foreach ($request->steps as $stepData) {
            $step = new WorkoutStep();
            $step->workout_id = $workout->id;
            $step->title = $stepData['title'];
            $step->description = $stepData['description'];
            $step->repetitions = $stepData['repetitions'];
            $step->time = $stepData['time'];
            $step->order = $stepData['order'];
            $step->save();
        }


        $workouts = $this->getWorkoutsBySport($workout->sport);
        return view('workouts.sport', compact('sport', 'workouts'));

    }



    public function steps($workoutId)
    {
        $steps = WorkoutStep::all()->where('workout_id', $workoutId)->sortBy('order')->toArray();
        return view('workouts.steps', compact('steps'));
    }

    public function create($sport)
    {
        $workouts = $this->getWorkoutsBySport($sport);
        return view('workouts.create', compact('sport'));
    }
    public function createSteps($workoutId)
    {
        return view('workouts.create_steps', ['workoutId' => $workoutId]);
    }

    private function getWorkoutsBySport($sport)
    {
        $allWorkouts = Workout::where('sport', $sport)->get()->toArray();



        return $allWorkouts;
    }

}
