<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes, OrderByTrait;

    protected $guarded = [];


}
