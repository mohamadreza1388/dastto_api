<?php

namespace App\Http\Controllers\Auth;

use App\ApiResponseTrait;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\VerifyRequest;
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

        $user->otps()->create([
            "otp" => rand(10000, 99999)
        ]);

        return $this->success([
            "user" => $user->toArray()
        ], "User created successfully");
    }

    public function verify(VerifyRequest $request){
        $user = User::where("mobile", $request->input("mobile"))?->first();

        if (!$user) {
            return $this->fail(null, "User not found", 404);
        }

        $otp = $user->otps()->where("otp", $request->otp)->orderBy("id", "desc")->first();

        if (!$otp) {
            return $this->fail([
                "otp" => [
                    "otp.incorrect"
                ]
            ], "OTP incorrect", 404);
        }

        if ($otp->otp == $request->input("otp")) {
            $user->otps()->delete();

            return $this->success([
               "token" => $user->createToken('dastto')->plainTextToken
            ], "User verified successfully");
        }

        return null;
    }
}
