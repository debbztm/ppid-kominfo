<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaOption extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'seo', 'value', 'file'];
}
