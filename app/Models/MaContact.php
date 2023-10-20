<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaContact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message', 'time', 'ip_address', 'access_from', 'phone'];
}
