<?php

namespace Ineplant\Exceptions;

use Ineplant\Enum\ErrorCode;

class TypeErrorException extends \Exception {

    use BaseException;

    /**
     * TypeErrorException constructor.
     *
     * @param string $message
     * @param int $code
     */
    public function __construct($message = "", $code = ErrorCode::SYSTEM_FAIL) {
        $this->message = "TypeError: $message";
        $this->code    = $code;
    }
}