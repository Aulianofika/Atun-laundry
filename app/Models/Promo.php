<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'description',
        'discount',
        'valid_until',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
        'valid_until' => 'datetime'
    ];
}
