<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'product_id' => $this->product_id,
            'user_location_id' => $this->user_location_id,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'delivery' => $this->delivery,
            'status' => $this->status,
            'details' => $this->details,
            'user' => new UserResource($this->whenLoaded('user')),
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
