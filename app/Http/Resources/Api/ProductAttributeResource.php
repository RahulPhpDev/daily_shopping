<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributeResource extends JsonResource
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
            'attribute_id' => $this->id,
            'attribute_name' => $this->attribute_name,
            'selling_price' => $this->selling_price,
            'is_popular' => $this->is_popular
            ];
    }
}
