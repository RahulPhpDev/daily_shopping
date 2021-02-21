<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use SoftDeletes ,OrderByTrait;

    protected $fillable = ['brand_id','product_id','attribute_name','buying_price', 'selling_price'];

    public $timestamps = false;


    public function inventory() : HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * @return BelongsTo
     */
    public function brand() : BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function orderDeliveries() : BelongsTo
    {
        return $this->belongsTo(OrderProductDelivery::class, 'order_product_attribute_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image() : MorphMany
    {
        return $this->morphMany(Image::class, 'image');
    }

}
