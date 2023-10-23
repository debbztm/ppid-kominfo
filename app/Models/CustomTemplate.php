<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTemplate extends Model
{
    use HasFactory;
    protected $fillable = ['logo_header_color', 'topbar_color', 'sidebar_color', 'bg_color'];
}
