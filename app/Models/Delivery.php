<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
//    public $timestamp = ['deliver_at'];
    const CREATED_AT = 'deliver_at';

    protected $fillable = [
        'quantity',
        'vehicle_id',
        'deliver_to',
        'deliver_by',
        'order_product_id',
        'vehicle_id',
        'deliver_to',
        'deliver_by',
        'order_product_id'
    ];

    /**
     * @return BelongsTo
     */
    public function vehicle():BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
