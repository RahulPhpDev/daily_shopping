<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'logo'
    ];

    /**
     * @return HasMany
     */
    public function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
