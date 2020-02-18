<?php


namespace Ineplant\Enum;


class OrderType extends SplEnum {
    //应用购买
    const APP = 1;

    //应用套餐购买
    const APP_PACKAGE = 2;

    //红包
    const RED_PACKET = 3;
}