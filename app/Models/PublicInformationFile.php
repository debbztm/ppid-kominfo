<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicInformationFile extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'file', 'description', 'public_information_news_id'];

    public function publicInformationNews()
    {
        return $this->belongsTo(PublicInformationNew::class);
    }
}
