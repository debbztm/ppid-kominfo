<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaMainRegulation extends Model
{
    use HasFactory;
    protected $fillable = ['ma_regulation_category_id', 'title', 'about', 'file'];

    public function maRegulationCategory()
    {
        return $this->belongsTo(MaRegulationCategory::class);
    }
}
