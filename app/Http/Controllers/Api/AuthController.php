<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterRequest;
use App\User;
use Facades\App\Facades\AuthFacade;
use App\Http\Controllers\Controller;
use App\Traits\HasApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HasApiResponse;

    public function register(RegisterRequest $request)
    {
        User::create($request->validated());

        return $this->apiSuccess(true);
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        $authData = AuthFacade::login($credentials, $request);

        return $authData ? $this->apiSuccess($authData) : $this->apiError(__('auth.failed'), 401);
    }

    public function user()
    {
        return $this->apiSuccess(request()->user());
    }

    public function logout()
    {
        request()->user()->token()->revoke();
        
        return $this->apiSuccess([
            'message' => __('auth.logout_success')
        ]);
    }
}
