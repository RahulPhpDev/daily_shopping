<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
   use SoftDeletes;

   protected $fillable = [
     'uuid',
     'user_id',
     'location_id',
     'user_id',
   ];
}
