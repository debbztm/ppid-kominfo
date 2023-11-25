<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaRegulation extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'seo', 'url', 'is_url', 'type'];

    public function maRegulationFiles()
    {
        return $this->hasMany(MaRegulationFile::class);
    }
}
