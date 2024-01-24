<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class ErrorResponse extends JsonResponse
{
    public function __construct($data = null, $status = 409, $headers = [], $options = 0, $json = false)
    {
        $response = [
            'code'   => -1,
            'status' => 'Error',
            'data'   => $data
        ];

        parent::__construct($response, $status, $headers, $options, $json);
    }
}
