<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_id',
        'step_number',
        'title',
        'description',
        'repetitions',
        'time',
        'order'
    ];
}
