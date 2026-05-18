<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code', 'whatsapp', 'payment_method',
        'user_id_game', 'server_id_game', 'subtotal', 'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
