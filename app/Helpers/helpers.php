<?php

if (!function_exists('apiResponse')) {
    function apiResponse($data = null, $message = '', $success = true, $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => $success,
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
