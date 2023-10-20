<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaCategory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'save_date', 'code', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
