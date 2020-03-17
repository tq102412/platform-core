<?php


namespace Ineplant\Enum;


class OrderType extends SplEnum {
    //应用购买
    const APP = 1;

    //应用套餐购买
    const APP_PACKAGE = 2;

    //红包
    const RED_PACKET = 3;

    //充值单据
    const RECHARGE = 4;

    /**
     * @param $type
     * @return mixed|string
     */
    public static function typeName($type){
        $map = [
            self::RED_PACKET => '红包购买',
            self::RECHARGE => '充值',
        ];

        return $map[$type] ?? '应用购买';
    }

}