<?php
namespace Ineplant\Exceptions;

use Ineplant\Enum\ErrorCode;

class WechatNotVerifyServiceTypeException extends ReturnException{

    public function __construct($content = '', $errCode = ErrorCode::NOT_WECHAT_VERIFY_SERVICE) {
        parent::__construct($content, $errCode);
    }

}