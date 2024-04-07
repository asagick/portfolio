<?php

namespace AsaGick\Portfolio\Helpers;

use Illuminate\Http\Response as ILLResponse;

class Response
{
    public static function get($response_value)
    {
        if (env("APPLICATION_TYPE") && env("APPLICATION_TYPE") == "JSON") {
            return ILLResponse::json($response_value);
        }
        return $response_value;
    }
}
