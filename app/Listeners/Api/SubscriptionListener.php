<?php

namespace App\Listeners\Api;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubscriptionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $price = Product::query()
                        ->select('buying_price')
                        ->findOrFail($event->subscription->product_id)->buying_price;
        $event->subscription->price = $price;
    }
}
