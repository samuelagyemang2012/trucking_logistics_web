<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HTTPResponses;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    //
    use HTTPResponses;

    public function googleRedirect()
    {
        $url = Socialite::driver('google')
            ->stateless()
            ->redirect()
            ->getTargetUrl();

        return $this->success([
            'google_redirect_url' => $url
        ]);
    }

    public function googleCallback()
    {

        $callback = Socialite::driver('google')->stateless()->user();
        $user = User::where(['google_id' => $callback->google_id])->first();

        //if user exists
        //login
        if ($user) {
            return $this->success([
                'user_id' => $user->id,
                'token' => $user->createToken('api_token:' . $user->email)->plainTextToken
            ]);
        } else {
            //if user does not exist, 
            $new_user = User::updateOrCreate(
                [
                    'email' => $callback->email
                ],
                [
                    'google_id' => $callback->id,
                    'name' => $callback->name,
                    'profile_picture' => $callback->avatar,
                    'password' => Hash::make(Str::random(10))
                ]
            );

            return $this->success([
                'user_id' => $new_user->id,
                'token' => $user->createToken('api_token:' . $user->email)->plainTextToken
            ]);
        }
    }
}
