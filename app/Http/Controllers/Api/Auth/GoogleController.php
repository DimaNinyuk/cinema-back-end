<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginUrl()
    {
        return Response::json([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl(),
        ]);
    }

    public function Callback(){
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = null;

        $user = \App\User::firstOrCreate(
            [
                'email' => $googleUser->getEmail()
            ],
            [
                'email_verified_at' => now(),
                'name' => $googleUser->getName(),
                'status' => true,
            ]
        );
        //$token = $user->createToken('token-name')->plainTextToken;
        Auth::login($user, true);
        return Response::json([
            'user' => $user,
            'google_user' => $googleUser,
        ]);
    }
}
