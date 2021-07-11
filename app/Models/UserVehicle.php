<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'user_id',
      'vehicle_id',
    ];
    const UPDATED_AT = null;


}
