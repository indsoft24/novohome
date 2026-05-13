<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'user_id',
    'product_id',
    'name',
    'phone',
    'address',
    'qty',
    'total',
    'status',
    'razorpay_order_id',
    'payment_id'
];
}
