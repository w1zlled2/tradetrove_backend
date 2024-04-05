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
    public function __construct($code=422, $message='Validation error', $errors=[])
    {
        $data=[
            'error'=>[
                'code'=>$code,
                'message'=>$message,
            ]
        ];
        if (count($errors)){
            $data['error']['errors']=$errors;
        }
        $response = response()->json($data, $code);
        parent::__construct($response);
    }
}
