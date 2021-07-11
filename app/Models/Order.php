<?php

namespace App\Models;

use App\Enums\DateFormatEnum;
use App\Enums\OrderStatusEnum;
use App\Traits\OrderByTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
//   use SoftDeletes;
    use OrderByTrait;

    protected $appends = [
        'order_status'
        ];

   protected $fillable = [
     'uuid',
     'user_id',
     'user_location_id',
     'status'
   ];

    protected static function boot()
    {
        parent::boot();
        static::created( function ($order) {
            $order->uuid = '#'.str_pad($order->id , 3, "0", STR_PAD_LEFT);
            $order->save();
        });
    }

    public function getOrderStatusAttribute()
    {
        return array_keys(OrderStatusEnum::status)[$this->status];
    }

    public function getCreatedAtAttribute($date)
        {
            return Carbon::parse($date)->format(DateFormatEnum::CommonDateFormat);
    }

    /**
     * @return HasManyThrough
     */
    public function attribute() : HasManyThrough
    {
        return $this->hasManyThrough(
                ProductAttribute::class,
                OrderProductAttribute::class,
                'order_id', // foreign key in order_attributes table
            'product_id'
        );
    }

    /**
     * @return HasManyThrough
     */
    public function deliveries() : HasManyThrough
    {
        return $this->hasManyThrough(
            OrderProductDelivery::class,
            OrderProductAttribute::class,
          'product_attribute_id', //foreign order_product attribute
         'order_product_attribute_id'
        );
    }



    /**
     * @return HasMany
     */
    public function orderProduct() : HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function location() : BelongsTo
    {
       return $this->belongsTo(Location::class, 'user_location_id');
    }


}
