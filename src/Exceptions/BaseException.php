<?php

namespace Ineplant\Exceptions;

use Ineplant\ApiResponse;

trait BaseException {

    /**
     * @var string $message
     */
    protected $message;

    /**
     * @var int code
     */
    protected $code;

    /**
     * 处理异常
     *
     * @return array
     */
    public function render() {
        return ApiResponse::handler($this->message, $this->code);
    }

}