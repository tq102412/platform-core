<?php


namespace Ineplant\Enum;

/**
 * 应用类型
 *
 * @package Ineplant\Enum
 */
class AppType extends SplEnum {
    //活动助手
    const ACTIVITY = 1;

    //会员卡
    const VIP = 2;

    //优惠券
    const COUPON = 3;

    //短信群发
    const GROUP_MSG = 4;

    //短信数量
    const MSG_QUANTITY = 5;

    //模版消息群发
    const GROUP_TEMPLATE_MSG = 6;

    //模版消息条数
    const TEMPLATE_MSG_QUANTITY = 7;

    //自动回复
    const AUTO_REPLY = 8;

    //自定义菜单
    const CUSTOM_MENU = 9;
}