<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
        'price'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
