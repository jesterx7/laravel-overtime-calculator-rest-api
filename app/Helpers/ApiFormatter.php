<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Response;

class ApiFormatter {
    protected static $response = [
        'code' => null,
        'message' => null,
        'data' => null
    ];

    public static function formatApi($code = null, $message = null, $data = null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return Response::json(self::$response, self::$response['code']);
    }
}

?>