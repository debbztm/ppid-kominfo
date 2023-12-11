<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicInformationNew extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'seo', 'description', 'image', 'is_publish', 'username', 'views', 'public_information_id'];

    public function publicInformation()
    {
        return $this->belongsTo(PublicInformation::class);
    }

    public function publicInformationFiles()
    {
        return $this->hasMany(PublicInformationFile::class);
    }
}
