<?php


namespace Ineplant\Exceptions;


use Ineplant\Enum\ErrorCode;

class PurchaseExpiredException extends ReturnException {
    /**
     * PurchaseExpiredException constructor.
     *
     * @param string $content
     * @param int $errCode
     */
    public function __construct($content = "请购买后继续使用该功能", $errCode = ErrorCode::POWER) {
        parent::__construct($content, $errCode);
    }
}