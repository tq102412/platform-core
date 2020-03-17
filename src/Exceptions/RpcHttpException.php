<?php

namespace Ineplant\Exceptions;

use Throwable;

/**
 * 不允许handle此异常
 *
 * Class RpcHttpException
 *
 * @package Ineplant\Exceptions
 */
class RpcHttpException extends \Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        $this->code    = $code;
        $this->message = $message;
    }

    public function render() {
        return response($this->getMessage(), 500);
    }
}