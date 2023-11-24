<?php

namespace App\Traits;

trait HttpResponses {

    protected function success($data, $code = 200, $message = null) {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error($data, $code, $message = null,) {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}