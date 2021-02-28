<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
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
        return  array_merge($this->validateAttribute(), $this->validateAddress());
    }

    /**
     * @param string $index
     * @return array
     */
    public function getValidateAttributeKeys(string $index= '*') : array
    {
//        return array_map(
//            function ($value) use ($index) {
//              return  str_replace( '*', $index, $value);
//            }
//            ,
//            array_keys( $this->validateAttribute() )
//        );
//      return $final;
//      dd($final);
//
//        dd( array_keys( $this->validateAttribute() ));
        return array_keys( $this->validateAttribute() );
    }

    /**
     * @return string[]
     */
    protected function validateAttribute() : array
    {
        return [
            'category_id.*' => 'required',
            'product_id.*' => 'required',
//            'attribute_id.*' => 'required',
            'quantity.*' => 'required',
            'delivery_type.*' => 'required',
            'delivery_days.*' => 'required',
            'total_orders' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function getValidateAddressKeys() :array
    {
        return array_keys( $this->validateAddress() );
    }

    /**
     * @return string[]
     */
    protected function validateAddress() :array
    {
        return [
            'address.state' => 'required',
            'address.city' => 'required',
            'address.pincode' => 'required',
            'address.detail' => 'required',
            'address.landmark' => 'required'
        ];
    }
    // @Todo in future many required if having enough product or not

}
