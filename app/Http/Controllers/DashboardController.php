<?php

namespace App\Http\Controllers;

use App\Models\ChallengeProgress;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $accepted = ChallengeProgress::with('challenge')
            ->where('user_id', Auth::id())
            ->where('status', 'accepted')
            ->get();

        $completed = ChallengeProgress::with('challenge')
            ->where('user_id', Auth::id())
            ->where('status', 'completed')
            ->get();

        return view('dashboard', compact('accepted', 'completed'));
    }
}
