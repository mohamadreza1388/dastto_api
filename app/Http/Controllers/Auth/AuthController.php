<?php

namespace App\Http\Controllers\Auth;

use App\ApiResponseTrait;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;

class AuthController
{
    use ApiResponseTrait;

    public function auth(AuthRequest $request)
    {
        $mobile = $request->input('mobile');

        $user = User::updateOrCreate([
            "mobile" => $mobile
        ]);

        return $this->success([
            "user" => $user->toArray()
        ], "User created successfully");
    }
}
