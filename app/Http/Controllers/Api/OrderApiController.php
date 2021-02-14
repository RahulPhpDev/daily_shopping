<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderApiRequest;
use App\Http\Resources\Api\UserOrderResource;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderProductAttribute;
use App\Models\ProductAttribute;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Validator;
use App\User;

class OrderApiController extends Controller
{

   public function index( Request $request,int $userId )
   {
        $orders = Order::
            with('')
            ->whereUserId($userId)->get();
        return response($orders, 200);
   }

   public function create(OrderApiRequest $request)
   {

       try {
           DB::beginTransaction();
           $userId = 2;
           // @todo may be we will get the address id

           $user =  User::findOrFail($userId);
           $location = Location::create(
               $request->only($request->getValidateAddressKeys())['address']
           );
           $userLocation = $user->userLocation()->create([   'location_id' => $location->id]);
           $orderData =  $user->orders()->create(
                [
                    'user_location_id' => $userLocation->id,
                    'status' => 0
                ]
            );
           OrderProductAttribute::saveRecord(
               array_merge(
                   [ 'order_id' => $orderData->id ],
                   $request->only($request->getValidateAttributeKeys())
               )
           );
           DB::commit();
//    @todo may be send an email
       }
       catch ( \Exception $d)
       {
           DB::rollBack();
           if(app()->environment('local') ) {
               dd( $d->getMessage(), $d->getCode());
           }

           return response('error found', $d->getCode());
       }
    dd('udd ja');
   }



    public function details(int $id)
    {
//        'attribute',
//                'attribute.product',
        $orders = Order::
             with( 'orderProductAttribute',
                'orderProductAttribute.orderAttributeDelivery',
                  'orderProductAttribute.productAttribute',
                'orderProductAttribute.product')
            ->findOrFail($id);
        return new UserOrderResource($orders);
        dd($orders);
        return response($orders, 200);
    }
}
