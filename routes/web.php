<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ChallengeProgressController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Workouts

Route::get('/workouts', function () {
    return view('workouts.index');
})->middleware(['auth'])->name('workouts.index');

Route::get('/workouts/{sport}', function ($sport) {
    return view('workouts.sport', compact('sport'));
})->middleware(['auth'])->name('workouts.sport');

Route::get('/workouts/sport/{sport}', [WorkoutController::class, 'showSportWorkouts'])->name('workouts.sport');

// Show workout details/start page
Route::get('/workouts/{id}', [WorkoutController::class, 'show'])->name('workouts.show');

Route::post('/workouts/store', [WorkoutController::class, 'store'])->name('workouts.store');

Route::get('/workouts/steps/{workoutId}', [WorkoutController::class, 'steps'])->name('workouts.steps');

Route::get('/workouts/create/{sport}', [WorkoutController::class, 'create'])->name('workouts.create');

//Challenge

Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
Route::get('/challenges/{id}', [ChallengeController::class, 'show'])->name('challenges.show');

Route::post('/challenges/{challenge}/accept', [ChallengeProgressController::class, 'accept'])->name('challenges.accept');
Route::post('/challenges/{challenge}/complete', [ChallengeProgressController::class, 'complete'])->name('challenges.complete');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', [ChallengeController::class, 'dashboard'])->middleware('auth')->name('dashboard');


require __DIR__ . '/auth.php';
