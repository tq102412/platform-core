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

    const POWER              = 20000; //一般权限不足
    const PEER_POWER         = 20001; //同级权限不匹配,例如可以为别人助力无法为自己助力
    const APP_PURCHASE_POWER = 21001; //应用购买失效

    const API     = 30000; //API调用错误
    const RPC     = 30001; //RPC服务调用错误
    const HORIZON = 30002; //队列服务调用异常

    const REDIRECT = 302; //需要重定向

    //数据 数量/时间/状态 有误
    const DATA                 = 40000;
    const DATA_NUM             = 40001;
    const DATA_TIME            = 40002;
    const DATA_STATUS          = 40003;
    const UNION_INFO_NOT_FOUND = 40004;
    const MODEL_NOT_FOUND      = 40005; //数据查询失败
    const NEED_OPTIMIZATION    = 40006; //需要完善资料
    const NOT_ALL_SUCCESSFUL   = 40007; //未全部成功
    const UNBIND_WECHAT        = 40008; //未绑定公众号

    const NOT_WECHAT_VERIFY_SERVICE = 40009; //不是微信认证服务号
    const CONFIG_ADMIN              = 40010;//管理员配置错误
    const CONFIG_BUSINESS           = 40011;//B端用户配置错误
    const NOT_WECHAT_VERIFY         = 40012; // 公众号没有认证

    //模板消息的行业不符，但修改失败：本月已超出修改次数
    const TEMPLATE_INDUSTRY_ERROR = 43100;
    //处理中,稍后重新处理
    const WAIT_HANDLE = 42002;

    const SQL               = 50001; //sql执行错误
    const COMPANY_NOT_FOUND = 50002; //店铺不存在
    const WXA_LOGIN_INVALID = 50003; //小程序登录失效

    const TEXT_ANTI_SPAM = 61011;//文本反垃圾未通过

    const CODE = 99999; //代码错误

    const ErrorMsg = [
        self::PARAM                     => '参数错误',
        self::ID                        => '参数错误',
        self::SECRET                    => '参数错误',
        self::POWER                     => '没有权限',
        self::PEER_POWER                => '没有权限',
        self::API                       => 'API调用错误',
        self::HORIZON                   => '服务异常，请稍后重试',
        self::REDIRECT                  => '需要重定向',
        self::DATA                      => '数据有误',
        self::DATA_NUM                  => '数据有误',
        self::DATA_TIME                 => '数据有误',
        self::SQL                       => '未知错误',
        self::CODE                      => '代码错误',
        self::NOT_FOUND                 => '资源不存在',
        self::UNAUTHORIZED              => '没有权限',
        self::SYSTEM_FAIL               => '系统错误',
        self::UNION_INFO_NOT_FOUND      => '没有找到关联信息',
        self::COMPANY_NOT_FOUND         => '店铺不存在',
        self::TEXT_ANTI_SPAM            => '你发布的内容含有敏感内容，请修改后重试！',
        self::MODEL_NOT_FOUND           => '未查询到相关数据',
        self::TEMPLATE_INDUSTRY_ERROR   => '模板消息的行业不符，但修改失败：本月已超出修改次数',
        self::UNBIND_WECHAT             => '未绑定公众号',
        self::NOT_WECHAT_VERIFY_SERVICE => '使用该功能需要先授权已认证服务号',
        self::NOT_WECHAT_VERIFY         => '使用该功能需要先授权已认证公众号',
        self::WXA_LOGIN_INVALID         => '小程序登录失效',
        self::WAIT_HANDLE               => 'timeout'
    ];


    /**
     * @param $errCode
     * @return string
     */
    public static function toString($errCode): string {
        return self::ErrorMsg[$errCode] ?? "未知错误";
    }


}