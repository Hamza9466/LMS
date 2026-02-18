<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'digits',
        'shortdescription',
    ];
}
