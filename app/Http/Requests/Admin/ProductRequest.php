<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return array_merge(
            $this->productValidation(),
            $this->attributeValidation()
        );
    }

    public function productValidation():array
    {
        return [
             'name' => 'required|min:1',
            'unit_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public function attributeValidation(): array
    {
        return [
            'brand_id.*' => 'required',
            'attribute.*' => 'required|min:2',
            'quantity.*' => 'required',
            'buying_price.*' => 'required',
            'selling_price.*' => 'required',
            'count_times' => 'required',
            'is_popular.*' => 'sometimes|nullable'
        ];
    }


    private function image()
    {

    }
}
