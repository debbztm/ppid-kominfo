<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'seo'];

    public function maImageGalleries()
    {
        return $this->hasMany(MaImageGallery::class);
    }
}
