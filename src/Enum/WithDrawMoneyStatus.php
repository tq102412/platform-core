<?php

namespace Ineplant\Enum;

/**
 * Class WithDrawMoneyStatus
 * 不能随便更改，user account 中使用了相同的状态码
 *
 * @package Ineplant\Enum
 */
class WithDrawMoneyStatus {
    const HANDLING = 1;
    const FAIL = 2;
    const EXCEPTION = 3;
    const SUCCESS = 10;
}