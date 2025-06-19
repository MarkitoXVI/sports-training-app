<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeController extends Controller
{
    public function index()
{
    $challenges = Challenge::all();
    return view('challenges.index', compact('challenges'));
}

public function dashboard()
{
    $accepted = auth()->user()->challengeProgresses()->where('status', 'accepted')->with('challenge')->get();
    $completed = auth()->user()->challengeProgresses()->where('status', 'completed')->with('challenge')->get();

    return view('dashboard', compact('accepted', 'completed'));
}

}
