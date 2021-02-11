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

   public function create(Request  $request)
   {
       dd($request->all());
   }
}

//
//category_id:1
//product_id: 2
//attribute_id:1
//qunatity:12
//delivery_type:daily
//delivery_days:[{sunday:true, time:10},{monday:true, time:10}]
//address: { state: 'pujab', 'city': 'Chandigrah', pincode: 32223, detail: 'House No 12, Sector B ABC Colony', landmark: 'Relience store'}
