<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use OrderByTrait;
    protected $fillable = ['name'];
    public $timestamps = false;

}
