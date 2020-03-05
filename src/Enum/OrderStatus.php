<?php


namespace Ineplant\Enum;


class OrderStatus extends SplEnum {
    //未支付
    const UNPAID = 0;

    //翼支付
    const PAID = 10;

    //退款成功
    const REFUNDED = 20;

    //退款失败
    const REFUND_FAIL = 25;
}