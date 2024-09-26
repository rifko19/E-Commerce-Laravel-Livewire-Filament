<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',
        'item',
        'notes',
        'grand_total',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->hasMany(OrderItem::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }
}
