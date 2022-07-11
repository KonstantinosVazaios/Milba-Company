<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_id',
        'duration',
        'price',
        'payment_method'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
