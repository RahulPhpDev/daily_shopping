<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes,OrderByTrait;

    protected $fillable = [
        'state',
        'city',
        'code',
        'landmark'
    ];
}
