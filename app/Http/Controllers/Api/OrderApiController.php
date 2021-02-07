<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
   public function myOrder( Request $request, $userId )
   {
        $orders = Order::whereUserId($userId)->get();
        return response($orders, 200);
   }
}
