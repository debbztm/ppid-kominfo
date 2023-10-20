<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaOfficialProfileList extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_official_profile_id',
        'name',
        'position',
        'rank',
        'nip',
        'education',
        'diklat',
        'lhkpn',
        'photo'
    ];

    public function maOfficialProfile()
    {
        return $this->belongsTo(MaOfficialProfile::class);
    }
}
