<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Return Success response
     * @param array|null $result
     * @param string|null $message
     * @return JsonResponse
     */
    public function responseSuccess($result, $message) {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response, 200);
    }

    /**
     * Return Error response
     * @param string $error
     * @param array $errors
     * @param int $code
     * @return JsonResponse
     */
    public function responseError($error, $errors = [], $code = 404) {
        $response = [
            'success' => false,
            'message' => $error
        ];
        if(!empty($errors)){
            $response['data'] = $errors;
        }
        return response()->json($response, $code);
    }
}
