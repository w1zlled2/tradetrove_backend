<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class APIException extends HttpResponseException
{
    /**
     * @param $code
     * @param $message
     * @param $errors
     */
    public function __construct($code = 422, $message = 'Validation error', $errors = [], $needSuccess = true)
    {
        $data = [];
        if ($needSuccess) $data['success'] = false;
        $data['message'] = $message;
        if (count($errors)) $data['errors'] = $errors;

        $response = response()->json($data, $code);
        parent::__construct($response);
    }
}
