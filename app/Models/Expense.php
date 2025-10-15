<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'item',
        'quantity',
        'price',
        'date'
    ];

    protected $casts = [
        'date' => 'date',
        'quantity' => 'integer',
        'price' => 'integer',
    ];
}
