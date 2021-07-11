<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public static $wrap = 'products';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => 200,
            'status' => 'success',
            'products' => $this->productCollection() ,
        ];
    }


    private function productCollection()
    {
       return $this->collection->map( function ($value) {
           return [
               'id' => $value->id,
               'name' => $value->name,
               'uuid' => $value->uuid,
               'image' => optional($value->image->first())->src,
               'buying_price' => $value->buying_price,
               'selling_price' => $value->selling_price,
               'is_popular' => $value->is_popular
//               'item' => ProductAttributeResource::collection($value->attributes)
           ];
        });
    }
}
