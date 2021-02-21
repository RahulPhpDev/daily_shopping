<?php

namespace App\Models;

use App\Traits\OrderByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Advertisement extends Model
{
    CONST VIDEO = 2;
    CONST IMAGE = 1;

    use SoftDeletes, OrderByTrait;

    protected $guarded = [];

    protected $casts = [
        'type' => 'int'
    ];

    public function getUrlAttribute($url)
    {
        return url('/').'/storage/'.$url;
    }

    public function getTypeAttribute($type)
    {
        return self::VIDEO === $type ? 'Video' : 'Image';

    }


}
