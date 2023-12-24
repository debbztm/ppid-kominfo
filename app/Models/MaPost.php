<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'hall_id',
        'ma_hall_menu_id',
        'hall_menu',
        'title',
        'seo',
        'description',
        'image',
        'link',
        'tag_post',
        'day',
        'date',
        'is_hall',
        'username',
        'phone',
        'is_publish',
        'type',
        'views'
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function maHallMenu()
    {
        return $this->belongsTo(MaHallMenu::class);
    }
}
