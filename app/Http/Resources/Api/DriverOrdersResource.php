<?php

namespace App\Http\Resources\Api;

use App\Enums\OrderStatusEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'driver' => $this->getDriverData(),
            'vehicleOrder' => $this->vehicleOrder()
        ];
    }

    private function getDriverData()
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email
        ];
    }

    private  function vehicleOrder()
    {
        return [
            $this->vehicleOrder->map( function ($data) {
              return  [
                    'order_attribute_id' => $data->order_attribute_id,
                    'quantity' => $data->orderProductAttribute->quantity,
                    'price' => $data->orderProductAttribute->price,
                    'status' => $data->orderProductAttribute ->status,
                    'order_uuid' => $data ->order ->uuid,
                    'order_id' =>  $data ->order->user_id,
                    'user_location_id' =>  $data  ->order->user_location_id,
                    'product_attribute' => $this->productItem($data->orderProductAttribute->productAttribute),
                    'location' => $this->orderLocation($data  ->order->location)
                ];
            })
        ];
    }

    private function orderLocation($location)
    {
        return [
            'state' => $location->state,
            'city' => $location->city,
            'code' => $location->code,
            'landmark' => $location->landmark,
        ];
    }

    private function productItem($item)
    {
        return [
            'attribute_name' => $item->attribute_name,
            'product_id' => $item->product_id,
        ];
    }
}


