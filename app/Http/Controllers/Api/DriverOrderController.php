<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DriverOrdersResource;
use App\Models\Order;
use App\Models\OrderProductAttribute;
use Illuminate\Http\Request;
use App\User;

class DriverOrderController extends Controller
{
    public function orders($driverId)
    {
        $driverId = 3;
        $users = User::with('vehicleOrder',
            'vehicleOrder.orderProductAttribute',

                    'vehicleOrder.orderProductAttribute.productAttribute',
            'vehicleOrder.order',
            'vehicleOrder.order.user',
            'vehicleOrder.order.location'
                )
                ->findOrFail($driverId);

        return new DriverOrdersResource($users);
//        dd($users->toArray());
//        return $data;
//        return response($users);
    }

    public function deliverOrder(Request $request)
    {
            OrderProductAttribute::
                update( [
                    'status' => $request->status
            ])->
                    whereId($request->order_product_attribute);
            return response('order delivered');
    }

    public function  startDelivery(Request $request)
        {
                OrderProductAttribute:: update( [  'status' => $request->status ])
                    ->whereId($request->order_product_attribute);
                return response('order delivered');
        }

        public function completeOrder(Request $request)
        {
            OrderProductAttribute:: update( [  'status' => $request->status ])
                ->whereId($request->order_product_attribute);
            return response('order delivered');
        }
}
