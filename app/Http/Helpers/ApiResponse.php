<?php

namespace App\Http\Helpers;

class ApiResponse
{
    /**
     * Return a standardized success response.
     */
    public static function success($data = null, string $message = 'Success', int $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
            'errors' => null,
        ], $statusCode);
    }

    /**
     * Return a standardized error response.
     */
    public static function error($message = 'Error', $errors = null, int $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'status_code' => $statusCode,
            'message' => $message,
            'data' => null,
            'errors' => $errors,
        ], $statusCode);
    }
}
