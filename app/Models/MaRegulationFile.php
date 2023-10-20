<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaRegulationFile extends Model
{
    use HasFactory;
    protected $fillable = ['ma_regulation_id', 'title', 'description', 'file'];

    public function maRegulation(){
        return $this->belongsTo(MaRegulation::class);
    }
}
