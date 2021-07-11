<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileApiController extends Controller
{
   public function updateProfile( Request $request, $user_id)
   {
       $user = User::findOrFail($user_id);
       $user->update(
           $request->only('name', 'email', 'phone')
       );
       return response('updated', 200);
   }
}
