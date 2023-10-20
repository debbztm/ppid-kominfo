<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaOfficialProfile extends Model
{
    use HasFactory;
    protected $fillable = ['work_unit'];

    public function maOfficialProfileLists()
    {
        return $this->hasMany(MaOfficialProfileList::class);
    }
}
