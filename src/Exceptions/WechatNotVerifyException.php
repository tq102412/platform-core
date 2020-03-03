<?php
namespace Ineplant\Exceptions;

use Ineplant\Enum\ErrorCode;

class WechatNotVerifyException extends ReturnException{

    public function __construct($content = '', $errCode = ErrorCode::NOT_WECHAT_VERIFY) {
        parent::__construct($content, $errCode);
    }

}