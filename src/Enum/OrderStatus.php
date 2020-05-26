<?php


namespace Ineplant\Enum;


class OrderStatus extends SplEnum {
    //所有状态
    const ALL = -2;

    //默认显示状态(除了未支付的)
    const DEFAULT_SHOW = -1;

    //未支付
    const UNPAID = 0;

    //已支付/未生效
    const PAID_NOT_EFFECTIVE = 5;

    //已支付/待发货
    const PAID = 10;

    //退款成功
    const REFUNDED = 20;

    //退款失败
    const REFUND_FAIL = 25;
}