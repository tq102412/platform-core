<?php


namespace Ineplant\Enum;


class SearchEnum extends SplEnum {
    //姓名
    const NAME = 1;
    //昵称
    const NICKNAME = 2;
    //手机号
    const PHONE = 3;

    //订单编号
    const ORDER_NO = 4;

    public function getHandleName() {
        $name = $this->getStudlyName();
        return "listBy{$name}";
    }

}