<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\Request;
use App\Http\Resources\Api\{
    ReferralResource,
    ReferralCollection
};
use Auth;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Api\ApplyReferralRequest;

class ApplyReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referal  = Auth::user()->myReferral()->get();

       return new ReferralCollection($referal);
    }

    /**
     *
     *
     *
     */
     public function store(ApplyReferralRequest $request)
     {

        Auth::user()->update([
            'refered_by' => Referral::whereCode($request->code)->first()->user_id

        ]);
        return response()->json(['data' => ['msg' => 'applied coupne'], 'sucsess' => true]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referral $referral)
    {
        //
    }
}
