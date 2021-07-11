<?php

namespace App\Models;

use App\Events\Api\SubscriptionEvent;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Subscription extends Model
{
use  SoftDeletes;

protected $fillable = [
    'product_id',
    'user_location_id',
    'type',
    'quantity',
    'price',
    'delivery',
    'status',
    'details'
];

protected static function booted()
{
    static::addGlobalScope('orderByCreatedAt', function (Builder $builder) {
        $builder->orderByDesc('created_at');
    });
}

    protected $dispatchesEvents = [
    'saving' => SubscriptionEvent::class
];

protected $casts = [
    'type' => 'integer',
    'status' => 'integer',
    'delivery' => 'json',
    'price' => 'integer'
    ];
//    'product_id' => Product::class;
    //

    /**
     * @return BelongsTo
     */
    public function userLocation() : BelongsTo
    {
        return $this->belongsTo(UserLocation::class);
    }

    /**
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return HasOneThrough
     */
    public function user() : HasOneThrough
    {
        return $this->hasOneThrough(User::class, UserLocation::class, 'user_id', 'id', 'user_location_id');
    }

//    public function setPriceAttribute()
//    {
//        dd($this->price);
//    }
}
