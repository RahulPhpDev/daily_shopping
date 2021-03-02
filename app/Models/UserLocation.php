<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class UserLocation extends Model
{
    protected $table = 'user_location';
    protected $fillable = [
        'user_id',
        'location_id'
    ];
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function user() :BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
