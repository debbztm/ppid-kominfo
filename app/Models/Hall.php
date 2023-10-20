<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seo',
        'image',
        'profile',
        'phone',
        'email',
        'whatsapp'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function maHallMenus()
    {
        return $this->hasMany(MaHallMenu::class);
    }

    public function maPosts()
    {
        return $this->hasMany(MaPosts::class);
    }
}
