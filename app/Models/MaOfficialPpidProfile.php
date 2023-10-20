<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaOfficialPpidProfile extends Model
{
    use HasFactory;
    protected $fillable = ['title1', 'title2', 'image'];
}
