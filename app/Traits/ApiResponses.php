<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses {
    public function successResponse($data = [], $message = 'Data Found', $status = true, $code = 200): JsonResponse {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => true,
        ], $code);
    }

    function errorResponse($message = 'no data found', $code = 404, $data = [], $fields = null) : JsonResponse {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'fields' => $fields,
            'status' => false,
        ], $code);
    }
}