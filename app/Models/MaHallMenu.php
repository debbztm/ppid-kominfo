<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaHallMenu extends Model
{
    use HasFactory;
    protected $fillable = ['hall_id', 'menu', 'information'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
