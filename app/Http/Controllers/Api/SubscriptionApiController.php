<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubscriptionRequest;
use App\Http\Resources\Api\SubscriptionResource;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionApiController extends Controller
{
    public function store(SubscriptionRequest $request)
    {

       $subscription = Subscription::create(
             $request->all()
            );
        return  new SubscriptionResource( $subscription->loadMissing('product', 'user') );
    }

    public function mySubscription( $user_id )
    {

        $mySubscription = Subscription::whereHas('userLocation.user' , function ($query) use ($user_id) {
            $query->where('id', $user_id);
        }
        )->with('product', 'user')->get();
        return SubscriptionResource::collection($mySubscription);
    }
}
