<?php

namespace App\Http\Common\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response method.
     *
     * @return Response
     */
    protected function sendResponse($result, $message = null) {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        if (empty($message)) {
            unset($response['message']);
        }

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return Response
     */
    protected function sendError($error, $errorMessages = [], $code = 404) {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
