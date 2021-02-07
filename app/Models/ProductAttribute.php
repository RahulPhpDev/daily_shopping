<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use SoftDeletes;
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
}
