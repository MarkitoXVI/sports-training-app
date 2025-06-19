<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeProgressController extends Controller
{
    public function accept(Challenge $challenge)
    {
        ChallengeProgress::firstOrCreate([
            'user_id' => Auth::id(),
            'challenge_id' => $challenge->id,
        ]);

        return redirect()->back()->with('success', 'Challenge accepted!');
    }

    public function complete(Challenge $challenge)
    {
        $progress = ChallengeProgress::where('user_id', Auth::id())
            ->where('challenge_id', $challenge->id)
            ->first();

        if ($progress) {
            $progress->update(['status' => 'completed']);
        }

        return redirect()->back()->with('success', 'Challenge marked as completed!');
    }
}
