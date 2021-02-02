<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes, OrderByTrait;

    protected $casts = [
     'vehicle_type_id' => 'boolean'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'vehicle_type_id',
        'name',
        'number',
        'details',
    ];

    /**
     * @return BelongsTo
     */
    public function vehicleType():BelongsTo
    {
        return $this->belongsTo(VehicleType::class);
    }

}
