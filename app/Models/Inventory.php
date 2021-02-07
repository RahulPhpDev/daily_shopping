<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes, OrderByTrait;
    protected $fillable = ['quantity', 'product_attribute_id'];
    const UPDATED_AT = null;

//    public $casts = [
//        'created_at' => Carbon::createFromFormat('d-M-Y');
//    ]

    public function getCreatedAtAttribute($date)
    {

        return Carbon::parse($date)->format('d-M-Y');
    }

    public function productAttribute() : BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class);
    }
    /**
     * @return  HasManyThrough
     */
    public function product() : HasManyThrough
    {
        return $this->hasManyThrough(Product::class, ProductAttribute::class );
    }

}
