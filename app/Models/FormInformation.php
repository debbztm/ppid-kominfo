<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "job",
        "address",
        "email",
        "image",
        "information",
        "type",
        "purpose",
        "howtoget_information",
        "howtocopy_information",
        "description",
        "reason",
        "nameof_reported",
        "witness",
        "reported_identity",
        "date",
        "typeof_service",
        "evaluation1",
        "evaluation2",
        "evaluation3",
        "evaluation4",
        "evaluation5",
        "evaluation6",
        "evaluation7",
        "evaluation8",
        "evaluation9",
        "evaluation10",
        "suggestion"
    ];
}
