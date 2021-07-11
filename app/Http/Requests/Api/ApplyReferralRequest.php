<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Referral;
use Auth;
use App\Rules\CanApplyReferralCode;
use Illuminate\Auth\Access\AuthorizationException;

class ApplyReferralRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $userId = Referral::whereCode($this->input('code'))->first()->user_id;
        // return Auth::user()->id == $userId;
        return true;
    }

    // public function failedAuthorization($message = 'dfasdfasdf')
    // {
    //     throw new AuthorizationException('You have used incorrect ');
    // }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required', new CanApplyReferralCode]
        ];
    }
}
