<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaPolling extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'vote1',
        'vote2',
        'vote3',
        'vote4'
    ];
}
