<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::Where('email', $googleUser->email)->first();
        if (!$user) {
            $user = User::create(
                [
                    'email' => $googleUser->email,
                    'username' => $googleUser->name,
                    'avatar' => $googleUser->avatar,
                    'google_id' => $googleUser->id,
                ]
            );
        }
        $request->session()->regenerate();
        Auth::login($user, true);
        return redirect('/');
    }
}
