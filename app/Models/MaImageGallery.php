<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaImageGallery extends Model
{
    use HasFactory;

    protected $fillable = ['ma_gallery_id', 'image'];

    public function maGallery()
    {
        return $this->belongsTo(MaGallery::class);
    }
}
