<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $table = 'user_location';
    protected $fillable = [
        'user_id',
        'location_id'
    ];
    public $timestamps = false;
}
