<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model
{
    protected $fillable = ['name'];

    /**
     * @return BelongsToMany
     */
    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_role');
    }
}
