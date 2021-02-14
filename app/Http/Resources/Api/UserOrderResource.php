<?php

namespace App\Http\Resources\Api;

use App\Enums\DateFormatEnum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserOrderResource extends JsonResource
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
            'id' => $this->id,
            'order_uuid' => $this->uuid,
            'order_status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format(DateFormatEnum::CommonDateFormat),
            'attribute' =>$this->renderProductAttribute()

        ];
    }

    private function renderProductAttribute()
    {
     return   $this->orderProductAttribute->map( function ($value, $key) {
           return [
               'product_attribute' => [
                   'name' =>  $value->productAttribute ->attribute_name,
                   'brand_id' => $value->productAttribute->brand_id
               ],
               'product' => [
                   'name' =>  $value->product ? $value->product->name: null,
                   'unit_id' =>  $value->product ? $value->product->unit_id: null,
                   'unit_name' =>  $value->product ? $value->product->unit->name : null,
                   'category' => $value->product ? $value->product->category_id : null,
               ],

             'product_attribute_id'  => $value['product_attribute_id'],
               'quantity' => $value['quantity'],
               'price' => $value['price'],
               'status' => $value->status,
               'orderProductDelivery' => [
                   'timing' => $value->orderAttributeDelivery->timing,
                   'attribute_id' => $value->orderAttributeDelivery->order_product_attribute_id
               ],

           ];
        });
    }
}
