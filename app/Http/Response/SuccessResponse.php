<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class SuccessResponse extends JsonResponse
{
    public function __construct($data = null, $status = 200, $headers = [], $options = 0, $json = false)
    {
        $response = [
            'code'   => 1,
            'status' => 'Success',
            'data'   => $data
        ];

        parent::__construct($response, $status, $headers, $options, $json);
    }
}
