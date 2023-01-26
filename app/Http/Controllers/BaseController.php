<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result, $mesage) {
        $response = [
            "success" => true,
            "data" => $result,
            "message" => $mesage
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessage = [], $code = 404) {
        $response = [
            "succes" => false,
            "message" => $error
        ];

        if(!empty($errorMessage)) {
            $response ["data"] = $errorMessage;
        }
        return response()->json($response, $code);
    }
}