<?php


namespace Ineplant\Enum;


class PaySources extends SplEnum {
    //微信 充值
    const RECHARGE = 1;
    //微信 消费
    const CONSUME = 2;
    //微信 应用订单,红包下单
    const APPLICATION_ORDER = 3;
}