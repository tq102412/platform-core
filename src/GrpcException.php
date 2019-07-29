<?php

namespace Ineplant;

class GrpcException extends \RuntimeException {

    protected $response;

    public function __construct(string $message = "", $code = 0)
    {
        $this->response = ApiResponse::handler(
            $message,
            "$code"
        );

        $this->code = "$code";

        $this->message = $message;

    }

    public function getResponse(){
        return $this->response;
    }

}