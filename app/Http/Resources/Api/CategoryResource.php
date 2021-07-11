<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\DateFormatEnum;

class CategoryResource extends JsonResource
{
    public static $wrap = 'categories';
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
            'details' => $this->details,
            'created_at' => Carbon::parse($this->created_at)->format(DateFormatEnum::CommonDateFormat),
            'products' => CategoryProductResource::collection($this->whenLoaded('product')),
        ];
    }


}
