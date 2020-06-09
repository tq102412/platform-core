<?php


namespace Ineplant\Enum;


class RefundStatus  extends SplEnum {
    //无退款
    const NIL = 0;

    //部分支付(定金)
    const PART_SUCCESS = 100;

    //部分支付(定金) 失败
    const PART_FAIL = 150;
}