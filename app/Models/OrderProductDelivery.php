<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProductDelivery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_product_attribute_id',
        'type',
        'timing'
    ];

    protected $casts = [
      'timing' => 'json'
    ];
}
