<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeProgress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'challenge_id', 'status'];

    public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}


    public function challenge()
{
    return $this->belongsTo(\App\Models\Challenge::class);
}

}
