<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'title', 'seo', 'description', 'image', 'url', 'type', 'username', 'is_publish'];
}
