<?php

namespace Ozana\Units\Authentication\Http\Controllers\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Ozana\Support\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Ozana\Mail\WelcomeUser;


class AuthenticateController extends Controller
{
      /**
       * Authenticate the user
       *
       * @param  Request $request
       * @return \Illuminate\Http\JsonResponse
       */
    public function login(Request $request)
    {

        try {

            // grab credentials from the request
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt(
                $request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
                ]
            )
            ){
                return response()->json([ 'error' => 'invalid_credentials' ], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([ 'error' => 'could_not_create_token' ], 500);
        }

        // all good so return the token
        return response()->json(
            [
            'access_token' => $token,
            'token_type' => 'Bearer'
            ], 200
        );
    }

    /**
     * Register a new User
     *
     * @param  RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $user = User::create(
            [
            'name' => $request->first_name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'avatar' => $request->country_code,
            'provider_id' => $request->provider_id,
            'provider' => $request->provider,
            'access_token' => $request->access_token,
            'password' => bcrypt($request->password),
            ]
        );

        // Send mail to user
        Mail::to($user->email)->send(new WelcomeUser($user));



        $token = JWTAuth::attempt($request->only('email', 'password'));

        // all good so return the token
        return response()->json(
            [
            'access_token' => $token,
            'token_type' => 'Bearer'
            ], 201
        );
    }

    /**
     * Invalidate and log out the user
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->validate($request, [ 'token' => 'required' ]);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(
                [
                'success' => true
                ]
            );
        } catch (JWTException $e) {
            // Something went wrong whilst attemping to encode the token
            return response()->json([ 'success' => false, 'error' => 'Failed to logout, please try again.', 500 ]);
        }
    }

}
