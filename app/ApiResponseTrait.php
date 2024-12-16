<?php

namespace App;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    function success($data = null, $message = "Success", $code = 200): JsonResponse
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data,
            "code" => $code
        ]);
    }

    function fail($errors = null, $message = "Success", $code = 500): JsonResponse
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "errors" => $errors,
            "code" => $code
        ], $code);
    }
}
