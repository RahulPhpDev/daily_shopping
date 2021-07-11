<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
class VehicleOrderProduct extends Model
{
use OrderByTrait;

    protected $table = 'vehicle_order_product';

    protected $fillable = ['order_product_id','user_id'];


//    public function order() // wrong naming convension need to refacotr
//    {
//        return $this->hasOneThrough(
//            OrderProductAttribute::class,
//            Order::class,
//            'id', // through id
//            'order_id' // related model id
//        );
//    }


    public function order()
    {
        return $this->hasOneThrough(
            Order::class,
            OrderProductAttribute::class,
            'product_attribute_id', // through id
            'id', // related model id
            'order_attribute_id'
        );
    }


//    public function orderProductAttribute()
//    {
//        return $this->hasOneThrough(
//            OrderProductAttribute::class,
//            Order::class,
//            'id', // through id
//            'order_id' // related model id
//        );
//    }


    public function orderProductAttribute()
    {
        return $this->belongsTo(
            OrderProductAttribute::class,
            'order_attribute_id'
        );
    }
}
