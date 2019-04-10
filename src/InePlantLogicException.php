<?php

namespace Ineplant;

class InePlantLogicException extends \RuntimeException {

    // 这是用来给tq自己创造bug用的

    protected $response;

    public function __construct(string $message = "", $code = '1')
    {
        $this->response = ApiResponse::handler(
            $message,
            $code
        );

        $this->code = $code;

        $this->message = $message;

    }

    public function getResponse(){
        return $this->response;
    }

}