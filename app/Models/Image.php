<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\App;

class Image extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'src',
      'type'
    ];

    /**
     * @return MorphTo
     */
    public function image() :MorphTo
    {
        return $this->morphTo();
    }


    public function getSrcAttribute($value)
    {
       return App::environment('prod') ?  '/public'.$value : $value;
    }
}
