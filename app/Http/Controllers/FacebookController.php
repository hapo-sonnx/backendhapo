<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function getFacebookSignInUrl()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginfacebookCallback(Request $request)
    {
        dd('sdasdasd');
        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::Where('email', $facebookUser->email)->first();
        if (!$user) {
            $user = User::create(
                [
                    // 'email' => $facebookUser ->email,
                    // 'username' => $facebookUser ->name,
                    // 'avatar' => $facebookUser ->avatar,
                    'facebook_id' => $facebookUser ->id,
                ]
            );
        }
        $request->session()->regenerate();
        Auth::login($user, true);
        return redirect('/');
    }
}
