<?php

namespace App\Models;

//use App\Scope\OrderByIdScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\OrderByTrait;

class VehicleType extends Model
{
    use OrderByTrait;

    protected $fillable = [
        'name'
    ];
    public $timestamps = false;



//    protected static function booted()
//    {
//        static::addGlobalScope(new OrderByIdScope);
//    }

    /**
     * @return HasMany
     */
    public function vehicle() : HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
