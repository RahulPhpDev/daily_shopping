<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProductAttribute extends Model
{
    use SoftDeletes;
    protected $appends = [
        'product_attribute_status'
    ];

    protected $fillable = [
        'order_id',
        'product_attribute_id',
        'price',
        'status',
        'quantity',
        'deliver_at'
    ];
    public $timestamps = false;

    public static function saveRecord( $data )
    {
        for( $i = 0 ; $i < $data['total_orders']; $i++) {
            $orderProduct =  self::create(
                [
                    'order_id' => $data['order_id'],
                    'product_attribute_id' => $data['attribute_id']['*'][$i],
                    'price' => $data['quantity']['*'][$i] *
                        ProductAttribute::find( $data['attribute_id']['*'][$i] )->selling_price ,
                    'status' => 0,
                    'quantity' => $data['quantity']['*'][$i]
                ]
            ) ;
            ( new self )->saveOrderProductDelivery(
                $orderProduct,
                $data['delivery_days']['*'][$i]
            );
        }

    }

    /**
     * @return string
     */
    public function getProductAttributeStatusAttribute() : string
    {
        return array_keys(OrderStatusEnum::status)[$this->status];
    }
    /**
     * @param $orderProduct
     * @param $data
     * @return void
     */
    public function saveOrderProductDelivery($orderProduct, $data)
    {
        $orderProduct->orderAttributeDelivery()->create(
            [
                'type' => 1,
                'timing' => json_decode( $data)
            ]
        );

    }

    /**
     * @return HasOne
     */
    public function orderAttributeDelivery() : HasOne
    {
        return $this->hasOne(OrderProductDelivery::class,
                'order_product_attribute_id',
            'id');
    }

    /**
     * @return BelongsTo
     */
    public function productAttribute() : BelongsTo
    {
      return $this->belongsTo(ProductAttribute::class);
    }

    /**
     * @return HasManyThrough
     */
    public function product() : HasManyThrough
    {
        return $this->hasOneThrough(
                    Product::class,
                    ProductAttribute::class,
                    'product_id',
                  'id');
    }

    /**
     * @return HasOne
     */
    public function vehicleOrderAttribute() : HasOne
    {
     return   $this->hasOne(VehicleOrderAttribute::class, 'order_attribute_id');
    }
}
