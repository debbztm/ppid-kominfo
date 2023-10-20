<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaRegulationCategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'seo'];

    public function maMainRegulation()
    {
        return $this->hasMany(MaMainRegulation::class);
    }
}
