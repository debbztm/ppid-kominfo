<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'web_name',
        'web_description',
        'about',
        'home_text',
        'home_image',
        'home_tag',
        'web_tag',
        'web_phone',
        'web_email',
        'web_address',
        'maps_location',
        'web_logo',
        'application',
        'granted',
        'rejected',
        'objected',
        'ikm',
        'is_online',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
    ];
}
