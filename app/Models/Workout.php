<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
class Workout extends Model
{
    use HasFactory;
    protected $fillable = ['sport', 'title', 'description'];

}
