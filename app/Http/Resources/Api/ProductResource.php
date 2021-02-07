<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
//            'category' => $this->when(Auth::user()->isAdmin(), 'secret-value'),
            'category' => $this->category,
//            'id' => $this->id,
        ];
    }
}
