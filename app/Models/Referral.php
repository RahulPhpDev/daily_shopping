<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Referral extends Model
{
    protected $table = 'referral';


   const UPDATED_AT = null;

   protected $guarded = [];

   public function user()
   {

     return $this->belongsTo(User::class);
   }



}
