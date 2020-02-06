<?php

namespace Ineplant;

class InePlantLogicException extends \RuntimeException {

    protected $response;

    public function __construct(string $message = "", $code = '1')
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

    /**
     * 异常处理
     *
     * @return array
     */
    public function render() {
        return ApiResponse::handler($this->getMessage(), $this->getCode());
    }

}