<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicInformation extends Model
{
    use HasFactory;
    protected $fillable = ['title','description'];
    protected $table = "public_information";

    public function publicInformationNews()
    {
        return $this->hasMany(PublicInformationNew::class);
    }
}
