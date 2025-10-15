<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Service;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_id',
        'quantity',
        'subtotal'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
