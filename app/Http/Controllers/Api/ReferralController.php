<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\{
    ReferralResource,
    ReferralCollection
};
use App\Models\Referral;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ReferralResource($this->createOrShowCode());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ReferralResource($this->createOrShowCode());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function show(Referral $referral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referral $referral)
    {
        //
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

    protected function createOrShowCode()
    {
        $referral =  Auth::user()->referral();
        if ($referral->exists() )
        {
            return $referral->first();
        }
        $user = $referral->create([
            'code' => random_int(1000, 9999),
        ]);
        return $user;
    }
}
