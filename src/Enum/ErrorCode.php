<?php

namespace Ineplant\Enum;

class ErrorCode {

    // 没有错误
    const NOT_ERROR = 0;

    const NOT_FOUND = 404;

    const UNAUTHORIZED = 401;

    const SYSTEM_FAIL = 1;

    const PARAM = 10000;//一般参数错误

    const ID = 10001;//ID参数错误，或未查询到相关信息

    const SECRET = 10002; //密码错误

    const POWER = 20000; //一般权限不足

    const PEER_POWER = 20001; //同级权限不匹配,例如可以为别人助力无法为自己助力

    const API = 30000; //API调用错误

    const REDIRECT = 302; //需要重定向

    //数据 数量/时间/状态 有误
    const DATA        = 40000;
    const DATA_NUM    = 40001;
    const DATA_TIME   = 40002;
    const DATA_STATUS = 40003;

    const SQL = 50001; //sql执行错误

    const CODE = 99999; //代码错误

    const ErrorMsg = [
        self::PARAM        => '参数错误',
        self::ID           => '参数错误',
        self::SECRET       => '参数错误',
        self::POWER        => '没有权限',
        self::PEER_POWER   => '没有权限',
        self::API          => 'API调用错误',
        self::REDIRECT     => '需要重定向',
        self::DATA         => '数据有误',
        self::DATA_NUM     => '数据有误',
        self::DATA_TIME    => '数据有误',
        self::SQL          => '未知错误',
        self::CODE         => '代码错误',
        self::NOT_FOUND    => '资源不存在',
        self::UNAUTHORIZED => '没有权限',
        self::SYSTEM_FAIL  => '系统错误',
    ];


    /**
     * @param $errCode
     * @return string
     */
    public static function toString($errCode): string {
        return self::ErrorMsg[$errCode] ?? "未知错误";
    }


}