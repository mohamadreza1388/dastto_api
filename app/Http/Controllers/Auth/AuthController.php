<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AuthRequest;

class AuthController
{
    public function auth(AuthRequest $request)
    {
        echo "ok";
    }
}
