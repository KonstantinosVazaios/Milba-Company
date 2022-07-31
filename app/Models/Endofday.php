<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endofday extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime_from',
        'datetime_to'
    ];
}
