<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginApiController extends Controller
{
  use AuthenticatesUsers;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //   // dd('dfs');
    // }

      public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        if ($user = User::whereEmail($request->email)->first() ) {

            if (Hash::check( $request->password, $user->password)) {
                $token = $user->createToken('authToken')->plainTextToken;
                $user->token = $token;
                $response = [
                    'result' => 1,
                    'data' => $user
                ];
                return response($response, 200);
            } else {
                $response = ["message" => "Password not found"];
                return response($response, 422);
            }
        }
        $response = ["message" => "user not found"];
        return response($response, 422);
    }
}
