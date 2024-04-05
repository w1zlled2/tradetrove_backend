<?php
function dataResponse($data = [], $code = 200,$message = '', $success = true): \Illuminate\Http\JsonResponse
{
    $response = [
        'success' => $success
    ];
    if ($data) $response['data'] = $data;
    if ($message) $response['message'] = $message;

    return response()->json($response, $code);
}


