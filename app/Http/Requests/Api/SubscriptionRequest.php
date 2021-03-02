<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required',
            'user_location_id'  => 'required',
            'type'  => 'required',
            'quantity'  => 'required',
//            'price'  => 'required',
            'delivery'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'price' => 0,
            'type' => 0,
            'status' => 0,
        ]);
    }
}
