<?php


namespace Ineplant\Enum;


class OrderPayMode {
    //未知(未付款)
    const UNKNOWN = 0;

    //微信
    const WX = 1;

    //余额
    const BALANCE = 20;

    //线下
    const OFFLINE = 255;
}