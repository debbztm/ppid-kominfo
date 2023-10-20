<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaAgenda extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'seo', 'description', 'username', 'time', 'hour', 'place'];
}
