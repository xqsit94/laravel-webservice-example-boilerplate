<?php

namespace App\Facades;

use Illuminate\Support\Facades\Auth;

class AuthFacade
{
    public function login($credentials, $request)
    {
        if(!Auth::attempt($credentials)) {
            return false;
        }

        $user = $request->user();
        $tokenResult = $user->createToken(config('app.name'));
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return [
            'access_token'  => $tokenResult->accessToken,
            'token_type'    => 'Bearer',
            'user'          => $user,
            'expires_at'    => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];
    }
}
