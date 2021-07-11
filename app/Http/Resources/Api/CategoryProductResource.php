<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductResource extends JsonResource
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
            'uuid' => $this->uuid,
            $this->mergeWhen($this->unit, [
                'category_id' => $this->category->id,
                'unit_name' => $this->unit->name,
                'abbreviation' => $this->unit->abbreviation,
            ]),
        ];
    }
}
