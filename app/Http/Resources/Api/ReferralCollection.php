<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReferralCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return $this->referralCollection();
    }

    public function with($request)
    {
        return [
            'code' => 200,
            'success' => true
        ];
    }

      private function referralCollection()
    {
       return $this->collection->map( function ($value) {
           return [
               'id' => $value->id,
               'name' => $value->name,
               'email' => $value->email,
           ];
        });
    }
}
