<?php

namespace App\Traits;

trait HTTPResponses
{

    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Request successful.',
            'message' => $message,
            'data' => $data
        ],$code);
    }

    protected function error($data, $message = null, $code)
    {
        return response()->json([
            'status' => 'An error has occured.',
            'message' => $message,
            'data' => $data
        ],$code);
    }
}
