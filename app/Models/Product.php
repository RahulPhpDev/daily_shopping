<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use SoftDeletes, OrderByTrait;

    protected $fillable = [
      'uuid',
      'brand_id',
      'category_id',
      'name',
      'unit_id'
    ];
    public $with = [ 'category', 'unit'];

    public static function boot()
    {
      parent::boot();
      self::creating( function ($model) {
          $model->uuid = Uuid::uuid1();
      });
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
    public function unit() :BelongsTo
    {
       return $this->belongsTo(Unit::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * @return HasMany
     */
    public function attributes() : HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image() : \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'image');
    }

}
