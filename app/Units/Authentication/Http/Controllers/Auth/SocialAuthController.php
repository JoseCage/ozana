<?php

namespace Ozana\Units\Authentication\Http\Controllers\Auth;

use Ozana\Support\Http\Controllers\Controller;

use Exception;
use Illuminate\Support\Facades\Auth;

use Socialite;
use Ozana\Modules\Users\User;

class SocialAuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | SocialAuth Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * Redirect to provider for authentication
    *
    * @param $driver* @return mixed
    */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Handle response of authentication redirect callback
     *
     * @param $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($driver)
    {
        $providerUser = Socialite::driver($driver)->user();

        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'username' => strtolower(str_slug($providerUser->getName(),'')),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                //'bio' => $providerUser->getBio(),
                //'birthdate' => $providerUser->getBirthDate(),
                // user can use reset password to create a password
                'password' => ''
            ]);
        }

        // login the user
        Auth::login($user, true);

    }

}
