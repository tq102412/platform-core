<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 2019/7/1
 * Time: 17:53
 */

namespace Ineplant\Exceptions;


use Ineplant\Enum\ErrorCode;
use Throwable;

class ValidationFailException extends ReturnException {
    /**
     * ValidationFailException constructor.
     * 通用参数异常
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "参数验证错误", $code = ErrorCode::PARAM) {
        parent::__construct($message, $code);
    }
}