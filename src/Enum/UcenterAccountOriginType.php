<?php

namespace Ineplant\Enum;

class UcenterAccountOriginType {
    // 充值订单 -> orderno
    const ORDER_CHARGE = "order_charge";

    // 消费订单 -> orderno
    const ORDER_CONSUME = "order_consume";

    // 拼团活动 -> team_id
    const ACTIVITY_GROUP = "activity_group";

    // 秒杀活动 -> orderno
    const ACTIVITY_SECKILL = 'activity_seckill';

    // 接龙活动 -> orderno
    const ACTIVITY_CHAIN = 'activity_chain';

    // 预售活动 -> orderno
    const ACTIVITY_PRE_SALE = 'activity_pre_sale';

    // 预售活动定金不退的 -> activity_id
    const ACTIVITY_PRE_SALE_DEPOSIT = 'activity_pre_sale_deposit';

    // 提现 -> 微信交易单号
    const WITH_DRAW_MONEY = 'withdrawmoney';
}