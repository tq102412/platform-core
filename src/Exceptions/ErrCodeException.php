<?php


namespace Ineplant\Exceptions;


use Ineplant\Enum\ErrorCode;

class ErrCodeException extends ReturnException {
    /**
     * 根据错误码返回错误信息
     *
     * @param string $message
     * @param int $code
     */
    public function __construct($code = ErrorCode::PARAM) {
        parent::__construct(ErrorCode::toString($code), $code);
    }
}